<?php

/**
 * Partners section for the front page (static).
 *
 * @package csie
 */

$csie_partners_dir = get_template_directory_uri() . '/assets/img/partners/';

// Desktop order (7×4 = 28). Each item: [filename, max-width, max-height].
$csie_desktop_partners = [
	['bau.svg', 46, 47], ['blaha.svg', 118, 35], ['cardbox.svg', 120, 39], ['cdkrone.svg', 45, 45], ['chanel.svg', 102, 16], ['dynea.svg', 85, 56], ['erber.svg', 46, 46],
	['fcc.svg', 62, 46], ['jenapay.png', 54, 54], ['friatec.svg', 83, 53], ['korapay.png', 55, 55], ['banktransfer.png', 87, 39], ['usdt.png', 53, 53], ['paymid.png', 55, 55],
	['visa.png', 68, 22], ['mastercard.png', 67, 40], ['banktransfer.png', 87, 39], ['usdt.png', 53, 53], ['jenapay.png', 54, 54], ['gfi.svg', 82, 46], ['herka.svg', 78, 45],
	['leiner.jpg', 46, 46], ['mobiletouch.svg', 120, 14], ['mobilezone.png', 124, 23], ['lta.svg', 76, 45], ['murer.svg', 99, 36], ['newco.svg', 98, 31], ['otis.svg', 100, 32],
];

// Mobile order (3,3,2,3,3,3,3,2,3,3 = 28). Each item: [filename, max-width, max-height].
$csie_mobile_partners = [
	['bau.svg', 30, 31], ['blaha.svg', 77, 23], ['fcc.svg', 41, 30],
	['jenapay.png', 35, 35], ['chanel.svg', 67, 10], ['erber.svg', 30, 30],
	['banktransfer.png', 87, 39], ['otis.svg', 95, 31],
	['visa.png', 44, 14], ['cardbox.svg', 79, 25], ['dynea.svg', 55, 36],
	['mastercard.png', 44, 26], ['murer.svg', 65, 23], ['cdkrone.svg', 29, 29],
	['usdt.png', 35, 35], ['herka.svg', 51, 30], ['image7.png', 35, 35],
	['mobilezone.png', 81, 15], ['lta.svg', 49, 29], ['jenapay.png', 35, 35],
	['leiner.jpg', 46, 46], ['newco.svg', 97, 31],
	['friatec.svg', 54, 34], ['paymid.png', 36, 36], ['gfi.svg', 54, 30],
	['banktransfer.png', 57, 26], ['mobiletouch.svg', 79, 9], ['korapay.png', 36, 36],
];

$csie_mobile_wide = [6, 7, 20, 21];
?>

<section class="py-[60px] lg:py-[100px] bg-white">
	<div class="max-w-[1200px] mx-auto px-[15px] xl:px-0">
		<h2 class="text-[25px] lg:text-[40px] font-bold uppercase leading-[1.2] text-[#353535] text-center mb-[30px] lg:mb-[40px]">
			<?php esc_html_e('Our Clients and Partners', 'csie'); ?>
		</h2>

		<!-- Desktop -->
		<div class="hidden lg:grid lg:grid-cols-7 gap-[2px]">
			<?php foreach ($csie_desktop_partners as $csie_item) : ?>
				<div class="bg-[#f8f8f8] h-[88px] flex items-center justify-center p-[15px]">
					<img
						src="<?php echo esc_url($csie_partners_dir . $csie_item[0]); ?>"
						alt="<?php echo esc_attr(pathinfo($csie_item[0], PATHINFO_FILENAME)); ?>"
						class="object-contain"
						style="max-width: <?php echo esc_attr($csie_item[1]); ?>px; max-height: <?php echo esc_attr($csie_item[2]); ?>px;"
						loading="lazy"
					>
				</div>
			<?php endforeach; ?>
		</div>

		<!-- Mobile -->
		<div class="grid grid-cols-6 gap-[2px] lg:hidden">
			<?php foreach ($csie_mobile_partners as $csie_i => $csie_item) :
				$csie_is_wide = in_array($csie_i, $csie_mobile_wide, true);
			?>
				<div class="bg-[#f8f8f8] flex items-center justify-center <?php echo $csie_is_wide ? 'col-span-3 h-[87px] p-[15px]' : 'col-span-2 h-[57px] p-[10px]'; ?>">
					<img
						src="<?php echo esc_url($csie_partners_dir . $csie_item[0]); ?>"
						alt="<?php echo esc_attr(pathinfo($csie_item[0], PATHINFO_FILENAME)); ?>"
						class="object-contain"
						style="max-width: <?php echo esc_attr($csie_item[1]); ?>px; max-height: <?php echo esc_attr($csie_item[2]); ?>px;"
						loading="lazy"
					>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
