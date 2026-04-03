#!/usr/bin/env bash
set -euo pipefail

SCRIPT_DIR="$(cd "$(dirname "$0")" && pwd)"
THEME_NAME="csie"
WP_THEMES_DIR="/home/wordpress/www/wp-content/themes"
DEST="$WP_THEMES_DIR/$THEME_NAME"

# ---------- Build ----------
echo "=> Building assets..."
npm run build --prefix "$SCRIPT_DIR"
echo "   Build complete."

# ---------- Sync to local WP ----------
echo "=> Deploying to $DEST ..."

rsync -av --delete \
  --exclude='node_modules/' \
  --exclude='src/' \
  --exclude='.env' \
  --exclude='.env.example' \
  --exclude='.env.local' \
  --exclude='.git/' \
  --exclude='.gitignore' \
  --exclude='.claude/' \
  --exclude='deploy.sh' \
  --exclude='deploy-local.sh' \
  --exclude='package.json' \
  --exclude='package-lock.json' \
  --exclude='vite.config.js' \
  --exclude='CLAUDE.md' \
  "$SCRIPT_DIR/" "$DEST/"

# ---------- Fix ownership ----------
chown -R wordpress:wordpress "$DEST"

echo "=> Local deploy complete! Theme available at: $DEST"
