<?php

/**
 * Partners section for the front page.
 *
 * @package csie
 */

$csie_img_dir = esc_url(get_template_directory_uri() . '/assets/img/partners/');

$csie_partners = array(
    array('file' => 'bau.svg',           'name' => 'Bau'),
    array('file' => 'blaha.svg',         'name' => 'Blaha'),
    array('file' => 'cardbox.svg',       'name' => 'Cardbox Packaging'),
    array('file' => 'cdkrone.svg',       'name' => 'C.D. Krone'),
    array('file' => 'chanel.svg',        'name' => 'Chanel'),
    array('file' => 'dynea.svg',         'name' => 'Dynea'),
    array('file' => 'erber.svg',         'name' => 'Erber Group'),
    array('file' => 'fcc.svg',           'name' => 'FCC Environment'),
    array('file' => 'jenapay.png',       'name' => 'Jena Pay'),
    array('file' => 'friatec.svg',       'name' => 'Friatec'),
    array('file' => 'korapay.png',       'name' => 'Kora Pay'),
    array('file' => 'banktransfer.png',  'name' => 'Bank Transfer'),
    array('file' => 'usdt.png',          'name' => 'USDT'),
    array('file' => 'paymid.png',        'name' => 'Paymid'),
    array('file' => 'visa.png',          'name' => 'Visa'),
    array('file' => 'mastercard.png',    'name' => 'MasterCard'),
    array('file' => 'banktransfer.png',  'name' => 'Bank Transfer'),
    array('file' => 'usdt.png',          'name' => 'USDT'),
    array('file' => 'jenapay.png',       'name' => 'Jena Pay'),
    array('file' => 'gfi.svg',           'name' => 'GFI'),
    array('file' => 'herka.svg',         'name' => 'Herka'),
    array('file' => 'leiner.jpg',        'name' => 'Leiner'),
    array('file' => 'mobiletouch.svg',   'name' => 'Mobiletouch'),
    array('file' => 'mobilezone.png',    'name' => 'Mobilezone'),
    array('file' => 'lta.svg',           'name' => 'LTA'),
    array('file' => 'murer.svg',         'name' => 'Murer'),
    array('file' => 'newco.svg',         'name' => 'New CO'),
    array('file' => 'otis.svg',          'name' => 'Otis'),
);
?>

<section class="py-[60px] lg:py-[100px] bg-white">
    <div class="max-w-[1200px] mx-auto px-[15px] xl:px-0">
        <h2 class="text-[25px] lg:text-[40px] font-bold uppercase leading-[1.2] text-[#353535] text-center mb-[30px] lg:mb-[40px]">
            <?php esc_html_e('Our Clients and Partners', 'csie'); ?>
        </h2>

        <div class="grid grid-cols-3 lg:grid-cols-7 gap-[2px]">
            <?php foreach ($csie_partners as $csie_partner) : ?>
                <div class="bg-[#f8f8f8] h-[57px] lg:h-[88px] flex items-center justify-center p-[10px] lg:p-[15px]">
                    <img
                        src="<?php echo esc_url($csie_img_dir . $csie_partner['file']); ?>"
                        alt="<?php echo esc_attr($csie_partner['name']); ?>"
                        class="max-h-full max-w-full object-contain"
                        loading="lazy"
                    >
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
