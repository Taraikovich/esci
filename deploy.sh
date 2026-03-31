#!/usr/bin/env bash
set -euo pipefail

SCRIPT_DIR="$(cd "$(dirname "$0")" && pwd)"

# ---------- Load .env ----------
ENV_FILE="$SCRIPT_DIR/.env"
if [[ ! -f "$ENV_FILE" ]]; then
  echo "Error: .env file not found. Copy .env.example to .env and fill in your FTP credentials."
  exit 1
fi
# shellcheck source=/dev/null
source "$ENV_FILE"

for var in FTP_HOST FTP_USER FTP_PASS FTP_PATH; do
  if [[ -z "${!var:-}" ]]; then
    echo "Error: $var is not set in .env"
    exit 1
  fi
done

# ---------- Build ----------
echo "=> Building assets..."
npm run build --prefix "$SCRIPT_DIR"
echo "   Build complete."

# ---------- Collect files to upload ----------
# Everything except dev-only files
EXCLUDE=(
  node_modules/
  src/
  .env
  .env.example
  .env.local
  .git/
  .gitignore
  .claude/
  deploy.sh
  package.json
  package-lock.json
  vite.config.js
  CLAUDE.md
  '.*\.log$'
)

EXCLUDE_ARGS=""
for pattern in "${EXCLUDE[@]}"; do
  EXCLUDE_ARGS="$EXCLUDE_ARGS --exclude $pattern"
done

# ---------- Upload via FTPS ----------
echo "=> Deploying to $FTP_HOST:$FTP_PATH ..."

lftp -c "
  set ftp:ssl-allow yes
  set ftp:ssl-force yes
  set ftp:ssl-protect-data yes
  set ssl:verify-certificate no
  open -u $FTP_USER,$FTP_PASS $FTP_HOST
  mirror --reverse --delete --verbose --parallel=4 \
    $EXCLUDE_ARGS \
    $SCRIPT_DIR $FTP_PATH
  bye
"

echo "=> Deploy complete!"
