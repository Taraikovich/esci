<?php

/**
 * Partners section for the front page (static).
 *
 * @package csie
 */

$csie_partners_dir = get_template_directory_uri() . '/assets/img/partners/';

// Desktop order (7 columns). Each item: [filename, max-width, max-height].
$csie_desktop_partners = [
	['baumit.svg', 46, 47],
	['blaha.svg', 118, 35],
	['cardboxpackaging.svg', 120, 39],
	['cbk.svg', 45, 45],
	['chanel.svg', 102, 16],
	['dynea.svg', 55, 55],
	['erbergroup.svg', 46, 46],
	['fcc.svg', 62, 46],
	['friatec.svg', 53, 53],
	['gfi.svg', 70, 70],
	['herka.svg', 78, 45],
	['leiner.jpg', 46, 46],
	['lta.svg', 76, 45],
	['mobiletouch.svg', 120, 14],
	['mobilezone.png', 124, 23],
	['murer.svg', 99, 36],
	['newco.svg', 98, 31],
	['otis.svg', 100, 32],
	['prochema.svg', 120, 22],
	['skidata.svg', 120, 28],
	['sonepar.svg', 80, 42],
	['uba.svg', 150, 70],
	['weleda.svg', 110, 40],
	['baw.png', 87, 42],
	['hso.jpg', 82, 45],
	['modus.svg', 50, 50],
	['roedl.svg', 120, 16],
	['sycor.svg', 110, 36],
	['wuerth.svg', 140, 40],
	['lotis.svg', 120, 16],
	['hermes.svg', 120, 19],
	['puaschitz.png', 170, 50],
	['ruchservomotor.svg', 100, 43],
	['solar.jpg', 50, 45],
	['technoalpin.svg', 120, 17],
	['a1.png', 45, 50],
	['siemens.svg', 110, 26],
];

// Mobile order (3 per row = 13 rows, last row 1 item). Each item: [filename, max-width, max-height].
$csie_mobile_partners = [
	['baumit.svg', 30, 31],
	['blaha.svg', 77, 23],
	['fcc.svg', 41, 30],
	['cbk.svg', 29, 29],
	['chanel.svg', 67, 10],
	['erbergroup.svg', 30, 30],
	['cardboxpackaging.svg', 79, 25],
	['dynea.svg', 50, 40],
	['friatec.svg', 35, 35],
	['gfi.svg', 33, 33],
	['herka.svg', 51, 30],
	['leiner.jpg', 38, 38],
	['lta.svg', 49, 29],
	['mobiletouch.svg', 79, 9],
	['mobilezone.png', 81, 15],
	['murer.svg', 65, 23],
	['newco.svg', 64, 20],
	['otis.svg', 65, 21],
	['prochema.svg', 79, 14],
	['skidata.svg', 79, 18],
	['sonepar.svg', 52, 28],
	['uba.svg', 120, 80],
	['weleda.svg', 90, 40],
	['baw.png', 57, 28],
	['hso.jpg', 54, 30],
	['modus.svg', 33, 33],
	['roedl.svg', 79, 11],
	['sycor.svg', 72, 24],
	['wuerth.svg', 120, 40],
	['lotis.svg', 79, 11],
	['hermes.svg', 79, 13],
	['puaschitz.png', 140, 40],
	['ruchservomotor.svg', 65, 28],
	['solar.jpg', 33, 30],
	['technoalpin.svg', 79, 11],
	['a1.png', 30, 33],
	['siemens.svg', 72, 17],
];

$csie_mobile_wide = [];
?>

<section class="py-[60px] lg:py-[100px] bg-white">
	<div class="max-w-[1200px] mx-auto px-[15px] xl:px-0">
		<h2 class="text-[25px] lg:text-[40px] font-bold uppercase leading-[1.2] text-[#353535] text-center mb-[30px] lg:mb-[40px]">
			<?php esc_html_e('Our Clients and Partners', 'csie'); ?>
		</h2>

		<!-- Desktop -->
		<div class="hidden lg:grid lg:grid-cols-7 gap-[2px]">
			<?php foreach ($csie_desktop_partners as $csie_item) : ?>
				<div class="group bg-[#f8f8f8] h-[88px] flex items-center justify-center p-[15px] overflow-hidden">
					<img
						src="<?php echo esc_url($csie_partners_dir . $csie_item[0]); ?>"
						alt="<?php echo esc_attr(pathinfo($csie_item[0], PATHINFO_FILENAME)); ?>"
						class="object-contain transition-transform duration-300 ease-out group-hover:scale-110"
						style="max-width: <?php echo esc_attr($csie_item[1]); ?>px; max-height: <?php echo esc_attr($csie_item[2]); ?>px;"
						loading="lazy">
				</div>
			<?php endforeach; ?>
		</div>

		<!-- Mobile -->
		<div class="grid grid-cols-6 gap-[2px] lg:hidden">
			<?php foreach ($csie_mobile_partners as $csie_i => $csie_item) :
				$csie_is_wide = in_array($csie_i, $csie_mobile_wide, true);
			?>
				<div class="group bg-[#f8f8f8] flex items-center justify-center overflow-hidden <?php echo $csie_is_wide ? 'col-span-3 h-[87px] p-[15px]' : 'col-span-2 h-[57px] p-[10px]'; ?>">
					<img
						src="<?php echo esc_url($csie_partners_dir . $csie_item[0]); ?>"
						alt="<?php echo esc_attr(pathinfo($csie_item[0], PATHINFO_FILENAME)); ?>"
						class="object-contain transition-transform duration-300 ease-out group-hover:scale-110"
						style="max-width: <?php echo esc_attr($csie_item[1]); ?>px; max-height: <?php echo esc_attr($csie_item[2]); ?>px;"
						loading="lazy">
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>