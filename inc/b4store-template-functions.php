<?php
/**
 * B4store template functions.
 *
 * @package b4store
 */

 /**
  * Global
 */

 /**
 * global array of main menu items
 */

$menuItems = [
	'Каталог' => '/shop',
	'Акции' => '/actions',
	'Новости' => '/category/news',
	'О компании' => [
		'О нас' => '/about',
		//'Отчеты' => '/otchety'
		'Производство' => '/production',
		'Партнеры' => '/partners'
	],
	'Контакты' => [
		'Контакты, схема проезда' => '/contacts',
		'Региональное присутствие' => '/category/dealers',
		'Письмо директору' => '/feedback'
	],
];

/**
 * global array exclude categories by id
 * 15 - uncategorized (эта хрень почему-то не работает!!!)
 */
$exclude_array = array(15);

/**
 * Default posts_per_page value for paging (pagination)
 */
$posts_per_page = 30;
/**
* Header functions
*/

if ( ! function_exists( 'b4store_header_navbar_open' ) ) {
	/**
	 * Header navbar open container
	 */
	function b4store_header_navbar_open() { ?>
		<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top border-bottom">
			<div class="container">
	<?php
	}
}

if ( ! function_exists( 'b4store_header_site_branding' ) ) {
	/**
	 * Header branding (logo)
	 */
	function b4store_header_site_branding() { ?>
		<div class="w-25">
			<a class="navbar-brand" href="<?= home_url() ?>">
				<img id="logo" src="<?= get_template_directory_uri() ?>/assets/images/logo.png" alt="Komplekt Premier">
			</a>
		</div>
	<?php
	}
}

if ( ! function_exists( 'b4store_header_product_search' ) ) {
	/**
	 * Product search form
	 */
	function b4store_header_product_search() { ?>
		<div class="d-none d-md-block w-50 pt-0 m-0">
		<?php echo do_shortcode('[wcas-search-form]'); ?>
			<!--<form>
				<div class="form-group  shadow-sm">
					<div class="input-group">
						<div class="input-group-prepend">
							<div class="input-group-text bg-white px-3"><i class="fa fa-search"></i></div>
						</div>
						<input type="search" class="form-control form-control-lg" id="search-input" placeholder="Поиск по товарам...">
					</div>
				</div>
			</form>-->
		</div>
	<?php
	}
}

if ( ! function_exists( 'b4store_header_contacts' ) ) {
	/**
	 * Header contacts
	 */
	function b4store_header_contacts() { ?>
		<div class="d-none d-md-block w-25 pl-5 mt-2 text-right">
			<h5 class="p-0 m-0 mb-2 mr-1">
				<a href="tel:+74955105353" class="text-kp-green font-weight-bolder"><i class="fa fa-phone text-warning mr-1"></i>+7 (495) 510-53-53</a>
			</h5>
			<span class="m-0 mr-1 p-0">
				<a href="https://www.instagram.com/komplektpremier1/" 
					target="_blank"
					title="Наша страница в Instagram"
					class="text-decoration-none"
				>
				<i class="fab fa-instagram text-danger"></i>
				</a>
				<a href="https://www.facebook.com/KomplektPremier1/?eid=ARAjvZCG4yP5s987Aa3hL2InkSGHkPAB2QNKindqnkbpey3O86tysH36lySSuhuI7bHY_NzH7_gYIV2i" 
					target="_blank" 
					title="Наша страница в Facebook"
					class="text-decoration-none"
				>
				<i class="fab fa-facebook text-secondary ml-1"></i>
				</a>
			</span>
			<a href="#" data-toggle="modal" data-target="#feedback-modal" class="text-right small btn-kp-green rounded text-light py-1 px-3 mr-1">обратный звонок</a>
		</div>
	<?php
	}
}

if ( ! function_exists( 'b4store_header_navbar_toggler' ) ) {
	/**
	 * Header navbar toggler ( hamburger )
	 */
	function b4store_header_navbar_toggler() { ?>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
	<?php
	}
}

if ( ! function_exists( 'b4store_header_navbar_collapse' ) ) {
	/**
	 * Header navbar collapse ( mobile menu )
	 */
	function b4store_header_navbar_collapse() { ?>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto d-md-none text-center bg-white m-0 p-0">
				<li class="nav-item">
					<a class="nav-link" href="<?= home_url() ?>">Главная</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="<?= get_permalink( wc_get_page_id( 'shop' ) ) ?>">Каталог</a>
				</li>
				<li class="d-none nav-item">
					<a class="nav-link" href="<?= get_page_link( 'actions' ) ?>">Акции</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= get_page_link( 'news' ) ?>">Новости</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= get_page_link( 'about' ) ?>">О компании</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= get_page_link( 'contacts' ) ?>">Контакты</a>
				</li>
			</ul>
		</div> <!-- ./ collapse -->
	<?php
	}
}

if ( ! function_exists( 'b4store_header_navbar_close' ) ) {
	/**
	 * Header navbar close container
	 */
	function b4store_header_navbar_close() { ?>
			</div> <!-- ./ container -->
        </nav>  <!-- ./ nav -->
	<?php
	}
}

/**
* Main menu functions
*/

if ( ! function_exists( 'b4store_main_menu_open' ) ) {
	/**
	 * Main menu catalog open container
	 */
	function b4store_main_menu_open() { ?>
		<div id="main-menu-container" class="container-fluid bg-kp-green py-2 fixed-top shadow">
			<div class="row">
				<div class="col-12">
					<div class="container">
						<div class="row">
	<?php
	}
}

if ( ! function_exists( 'b4store_main_menu_items' ) ) {
	function b4store_main_menu_items() { ?>
		<?php 
			// main menu widget
			/*wp_nav_menu( [
				'menu' => 'main-menu',
				'container' => 'div',
				'container_class' => 'col-12 col-md-10 text-white d-none d-md-block',
				'menu_class' => 'nav nav-fill mt-1',
				'menu_id' => 'main-menu',
				'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			] ); */
	?>
		<div class="col-12 col-md-10 text-white d-none d-md-block">
			<ul class="nav nav-fill mt-1">
				<li class="nav-item dropdown">
					<a 
						id="catalog-nav-item"
						class="nav-link dropdown-toggle btn-kp-dark-green" 
						href="#" 
						data-toggle="dropdown" 
						aria-haspopup="true" 
						aria-expanded="false"
					>
						<i class="fa fa-bars mr-2"></i>
						Каталог
					</a>
					<ul class="dropdown-menu p-3 pb-4" aria-labelledby="catalog-nav-item">
						<?php
							$cat_args = array(
								'orderby'    => 'name',
								'order'      => 'asc',
								'hide_empty' => true,
								'exclude' => $exclude_array,
								'count' => true,
								'pad_counts' => true,
								'parent' => 0,
							);
							
							$product_categories = get_terms( 'product_cat', $cat_args );
							
							if( !empty($product_categories) && !is_wp_error( $product_categories ) ):
								foreach ($product_categories as $key => $category):

									$children = get_term_children( $category->term_id,  'product_cat' );

									if ( !empty( $children ) && !is_wp_error( $children ) ):
								?>
									<li class="dropdown-submenu">
										<a 
											id="dropdown-level-2-<?= $key ?>" 
											class="dropdown-item dropdown-toggle p-3 pl-4 animated fadeIn" 
											href="<?= get_term_link($category) ?>"
											role="button" 
											data-toggle="dropdown" 
											aria-haspopup="true" 
											aria-expanded="false"
										>
											<?= $category->name ?>
											<span class="badge badge-pill badge-warning shadow-sm"><?= $category->count ?></span>
										</a>
										<ul aria-labelledby="dropdown-level-2-<?= $key ?>" class="dropdown-menu border-0 shadow">
											<?php 
												/**
												 * копируем массив аргументов
												 * меняем $parent на id родительской категории (фильтр)
												 * получаем массив подкатегорий
												 */
												$sub_cat_args = $cat_args;
												$sub_cat_args['parent'] = $category->term_id;
												$sub_categories = get_terms( 'product_cat', $sub_cat_args );
							
												if( !empty($sub_categories) && !is_wp_error( $sub_categories ) ):
													foreach( $sub_categories as $key => $sub_cat ): ?>
														<li>
															<a tabindex="-1" class="dropdown-item p-2 pl-4 animated fadeIn" href="<?= get_term_link($sub_cat) ?>">
																<?= $sub_cat->name ?>
																<span class="badge badge-pill badge-warning shadow-sm"><?= $sub_cat->count ?></span>
															</a>
														</li>
											<?php 
													endforeach; 
												endif; 
											?>
										</ul>
									</li>
									
									<?php else: ?>
									
									<li>
										<a class="dropdown-item p-2 pl-4 animated fadeIn" href="<?= get_term_link($category) ?>">
											<?= $category->name ?>
											<span class="badge badge-pill badge-warning shadow-sm"><?= $category->count ?></span>
										</a>
									</li>

									<?php endif;?>

								<?php
								endforeach;
							endif;

						?>
					</ul>
				</li>
				<li class="d-none nav-item">
					<a class="nav-link text-white" href="#">Акции</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white" href="/category/news">Новости</a>
				</li>
				<li class="nav-item dropdown">
					<a 
						id="about-nav-item"
						class="nav-link dropdown-toggle" 
						href="#" 
						data-toggle="dropdown" 
						aria-haspopup="true" 
						aria-expanded="false"
					>
						О компании
					</a>
					<div class="dropdown-menu p-3 pb-4" aria-labelledby="about-nav-item">
						<a class="dropdown-item p-3 pl-4 animated fadeIn" href="/about">О нас</a>
						<a class="dropdown-item p-2 pl-4 animated fadeIn" href="/otchety">Отчеты</a>
						<a class="d-none dropdown-item p-2 pl-4 animated fadeIn" href="/production">Производство</a>
						<a class="d-none dropdown-item p-2 pl-4 animated fadeIn" href="/partners">Партнеры</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a 
						id="contacts-nav-item"
						class="nav-link dropdown-toggle" 
						href="#" 
						data-toggle="dropdown" 
						aria-haspopup="true" 
						aria-expanded="false"
					>
						Контакты
					</a>
					<div class="dropdown-menu p-3 pb-4" aria-labelledby="contacts-nav-item">
						<a class="dropdown-item p-2 pl-4 animated fadeIn" href="/contacts">Контакты, схема проезда</a>
						<a class="dropdown-item p-3 pl-4 animated fadeIn" href="/category/dealers">Региональное присутствие</a>
						<a class="dropdown-item p-2 pl-4 animated fadeIn" href="/feedback">Письмо директору</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white" target="_blank" href="/wp-content/uploads/2019/12/catalog-komplekt-premier-2020.pdf" title="Скачать каталог продукции в PDF">
						<i class="far fa-file-pdf mr-1"></i>
						Скачать каталог
					</a>
				</li>
			</ul>
		</div>
	<?php
	}
}

if ( ! function_exists( 'b4store_shopping_cart' ) ) {
	/**
	 * Main menu shopping cart
	 */
	function b4store_shopping_cart() { ?>
		<div class="col-12 col-md-2 text-right">
			<!-- WC cart -->
			<div class="s-header__basket-wr woocommerce">
				<?php global $woocommerce; ?>
				<a href="<?php echo $woocommerce->cart->get_cart_url() ?>" class="basket-btn basket-btn_fixed-xs btn btn-kp-yellow font-weight-bolder text-center mt-1 p-2">
					<i class="fa fa-shopping-basket text-kp-green mr-2"></i>
					<span class="basket-btn__label">Корзина</span>
					<span class="basket-btn__counter badge bg-kp-green text-white ml-1 py-2 px-2 shadow-sm"><?php echo sprintf($woocommerce->cart->cart_contents_count); ?></span>
				</a>
			</div>
			<!-- /.WC cart -->
		</div>
	<?php
	}
}

if ( ! function_exists( 'b4store_main_menu_close' ) ) {
	/**
	 * Main menu catalog close container
	 */
	function b4store_main_menu_close() { ?>
						</div> <!-- /.row -->
					</div>  <!-- /.container -->
				</div> <!-- /.col-12 -->
			</div> <!-- /.row -->
		</div>  <!-- /.container-fluid -->
	<?php
	}
}

/**
 * Homepage
 */

if ( ! function_exists( 'b4store_homepage_banner' ) ) {
	/**
	 * Homepage banner (slider, first screen...)
	 */
	function b4store_homepage_banner() { ?>
		<div class="row mb-n5">
			<div class="col-12 py-4 text-center bg-kp-yellow mt-0 mb-5 shadow">
				<h3 class="text-kp-dark-green font-weight-bold">РАСПРОДАЖА от Комплект Премьер</h3>
			</div>
		</div>

		<div id="action-container" class="row p-5 shadow">
			

			<div class="col-12 py-3 px-4 text-center bg-white mt-0 mb-5 shadow">
				<h4 class="text-danger font-weight-bolder">
				Ограниченные партии резных молдингов, молдингов и декоров ПВХ, мебельных опор из массива бука по специальным ценам
				</h4>
			</div>

			<div class="col-12 col-sm-4 p-0 px-2 mb-3">
				<div class="card h-100 shadow mb-3">
					<div class="card-header text-center bg-white text-dark shadow">
						<h4>Молдинги резные из массива бука</h4>
					</div>
					<div class="card-body px-5 py-4">
						<h5 class="card-title text-center text-danger">Скидки на <span class="badge badge-pill badge-warning py-2">14</span> позиций</h5>
						<p class="card-text">
							Придают интерьеру изысканный и роскошный вид. Они не только преображают стены и потолки, но и выполняют в помещении конкретные практические функции. С их помощью комната удобно разделяется на отдельные зоны.
						</p>
					</div>
					<div class="card-footer bg-light text-center py-4">
						<a href="/wp-content/uploads/2019/12/sales-molding-buk-12-19.pdf" class="btn btn-danger">
							<i class="far fa-file-pdf mr-1"></i>
							Скачать прайс
						</a>
					</div>
				</div>
			</div>
			<div class="col-12 col-sm-4 p-0 px-2 mb-3">
				<div class="card h-100 shadow mb-3">
					<div class="card-header text-center bg-white text-dark shadow">
						<h4>Молдинги и декоры<br class="d-none d-sm-block"> ПВХ</h4>
					</div>
					<div class="card-body px-5 py-4">
							<h5 class="card-title text-center text-danger">Скидки на <span class="badge badge-pill badge-warning py-2">15</span> позиций</h5>
						<p class="card-text">
							Используются в качестве декорирования фасадных частей мебели изготавливаемых с использованием финишного покрытия пленкой ПВХ и под окраску эмалью с эффектом Декапе (нанесение различных цветов патины).
						</p>
					</div>
					<div class="card-footer bg-light text-center py-4">
						<a href="/wp-content/uploads/2019/11/sales-molding-decore-pvh-china-11-19.pdf" class="btn btn-danger">
							<i class="far fa-file-pdf mr-1"></i>
							Скачать прайс
						</a>
					</div>
				</div>
			</div>

			<div class="col-12 col-sm-4 p-0 px-2 mb-3">
				<div class="card h-100 shadow mb-3">
					<div class="card-header text-center bg-white text-dark shadow">
						<h4>Мебельные опоры из массива бука</h4>
					</div>
					<div class="card-body px-5 py-4">
							<h5 class="card-title text-center text-danger">Скидки на <span class="badge badge-pill badge-warning py-2">7</span> позиций</h5>
						<p class="card-text">
							Мебельные опоры из цельного массива бука итальянского производства для производства столов, стульев и мягкой мебели обладают неповторимым дизайном и превосходным качеством
						</p>
					</div>
					<div class="card-footer bg-light text-center py-4">
						<a href="/wp-content/uploads/2019/12/sales-opory-mebelnie-12-19.pdf" class="btn btn-danger">
							<i class="far fa-file-pdf mr-1"></i>
							Скачать прайс
						</a>
					</div>
				</div>
			</div>
			
		</div> <!-- ./ row && action-container -->
	<?php
	}
}

if ( ! function_exists( 'b4store_homepage_content' ) ) {
	/**
	 * Homepage content
	 */
	function b4store_homepage_content() { ?>
		<div class="row my-3">
			<div class="col-12 p-3">
				<?= the_content() ?>
			</div>
		</div>
	<?php
	}
}
if ( ! function_exists( 'b4store_homepage_categories' ) ) {
	/**
	 * Homepage categories
	 */
	function b4store_homepage_categories() { ?>
		<div class="row my-5 p-4 shadow-sm">
			<div class="col-12 text-center p-3 mb-4">
				<h2 class="wist-sep-white">Категории товаров</h2>
			</div>
			<div class="col-12">
				<div class="row card-group text-center">
				<?php 
					$cat_args = array(
						'orderby'    => 'name',
						'order'      => 'asc',
						'hide_empty' => true,
						'exclude' => $exclude_array,
						'count' => true,
						'pad_counts' => true,
						'parent' => 0,
					);
					
					$product_categories = get_terms( 'product_cat', $cat_args );
					
					if( !empty($product_categories) && !is_wp_error( $product_categories ) ):
						foreach ($product_categories as $key => $category):
							$thumb_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );
            				$category_img = wp_get_attachment_url(  $thumb_id );
					?>
						<div class="col-md-3 p-3">
							<div class="card h-100 border-success shadow">
								<div class="card-body">
									<a href="<?= get_term_link($category) ?>">
										<img src="<?= $category_img ?>" class="card-img-top img-fluid" alt="<?= $category->name ?>">
									</a>
								</div>
								<div class="card-footer clearfix bg-kp-green border-success">
									<h5><a href="<?= get_term_link($category) ?>" class="text-white"><?= $category->name ?> <span class="badge badge-pill badge-warning"><?= $category->count ?></span></a></h5>
								</div>
							</div>
						</div> <!-- ./ end col -->
					<?php
						endforeach;
					endif;
				?>
				</div> <!-- ./ row -->
			</div> <!-- ./ col-12 -->
		</div> <!-- ./ row -->
	<?php
	}
}
if ( ! function_exists( 'b4store_homepage_advantages' ) ) {
	/**
	 * Homepage advantages
	 */
	function b4store_homepage_advantages() { ?>
		<div class="row my-5 p-4 pb-5 mb-5 shadow-sm">
			<div class="col-12 text-center p-3 mb-4">
				<h2 class="wist-sep-white">Наши преимущества</h2>
			</div>
			
			<div class="col-12">
				<div class="row card-group text-center">

					<div class="col-3">
						<div class="card">
							<img src="https://komplekt-premier.ru/wp-content/uploads/2017/03/pre-1.jpg" class="card-img-top rounded-circle" alt="">
							<div class="card-body">
								<h5 class="card-title text-success">Удобная система выбора и заказа товара</h5>
								<p class="card-text small">Online-каталог, технический каталог справочник, содержащий 360 полос полезной информации, просторный выставочный зал с представленной складской программой.</p>
							</div>
						</div>
					</div>
					<div class="col-3">
						<div class="card">
							<img src="https://komplekt-premier.ru/wp-content/uploads/2017/03/pre-2.jpg" class="card-img-top rounded-circle" alt="">
							<div class="card-body">
								<h5 class="card-title text-success">Ассортимент и качество товара</h5>
								<p class="card-text small">Сбалансированная складская программа, постоянное наличие товара на складе. Поставки товара осуществляются напрямую с заводов-изготовителей на правах эксклюзивности. В компании действует строгий контроль качества товара.</p>
							</div>
						</div>
					</div>
					<div class="col-3">
						<div class="card">
							<img src="https://komplekt-premier.ru/wp-content/uploads/2017/03/pre-3.jpg" class="card-img-top rounded-circle" alt="">
							<div class="card-body">
								<h5 class="card-title text-success">Комплексное решение для производителей</h5>
								<p class="card-text small">У нас вы найдете самый полный спектр молдингов, декоров, ножек или карнизов. Совместными усилиями мы поможем Вам решить любую задачу и реализовать проект любой сложности в области отделки интерьеров и производства мебели из массива.</p>
							</div>
						</div>
					</div>
					<div class="col-3">
						<div class="card">
							<img src="https://komplekt-premier.ru/wp-content/uploads/2017/03/pre-4.jpg" class="card-img-top rounded-circle" alt="">
							<div class="card-body">
								<h5 class="card-title text-success">Быстрые сроки доставки</h5>
								<p class="card-text small">С нами удобно работать, где бы вы не находились. Наши дилеры находятся в различных регионах нашей страны. А если в Вашем городе у нас еще нет партнера, мы с удовольствием организуем доставку продукции до Вас с помощью транспортной компании.</p>
							</div>
						</div>
					</div>
				</div> <!-- ./ row --> 
			</div> <!-- ./ col-12 -->
		</div> <!-- ./ row -->
	<?php
	}
}

if ( ! function_exists( 'b4store_homepage_feedback' ) ) {
	/**
	 * Homepage feedback
	 */
	function b4store_homepage_feedback() { ?>
		<div class="row my-5 p-4 pb-5 mb-5 shadow-sm">
			<div class="col-12 text-center px-3 mb-4">
				<h2 class="wist-sep-white">Обратная связь</h2>
			</div>

			<div class="col-12 p-3 mb-4 text-center">
				<form class="p-5 border shadow bg-light w-50 mx-auto">
					<h4 class="mb-3 pb-4 text-kp-green">Хотите написать нам письмо?</h4>
					<div class="input-group mb-4">
						<div class="input-group-prepend">
							<div class="input-group-text bg-white px-3"><i class="fa fa-user text-kp-green"></i></div>
						</div>
						<input type="text" class="form-control form-control-lg" id="main-feedback-input-your-name" placeholder="Ваше имя *" required>
					</div>
					<div class="input-group mb-4">
						<div class="input-group-prepend">
							<div class="input-group-text bg-white px-3"><i class="fa fa-envelope text-kp-green"></i></div>
						</div>
						<input type="email" class="form-control form-control-lg" id="main-feedback-input-your-email" placeholder="Ваш email *" required>
					</div>
					<div class="form-group">
						<textarea class="form-control form-control-lg" id="main-feedback-textarea" rows="4" placeholder="Текст сообщения"></textarea>
					</div>
					<div class="form-group form-check mx-auto">
						<input type="checkbox" class="form-check-input" id="main-feedback-policy-agreement" checked="checked">
						<label class="form-check-label small" for="main-feedback-policy-agreement">Согласен с условиями <a href="/policy" class="text-kp-green">Политики конфиденциальности</a></label>
					</div>
					
					<div class="text-center mt-5 mb-4">
						<button type="submit" class="btn btn-kp-yellow btn-lg">
							<i class="fa fa-envelope mr-2"></i>
							Отправить сообщение
						</button>
					</div>
					
				</form>
			</div> <!-- ./ col-12 -->

		</div> <!-- ./ row -->
	<?php
	}
}

/**
* Page functions
*/

if ( ! function_exists( 'b4store_breadcrumbs' ) ) {
	/**
	 * Breadcrumbs
	 */
	function b4store_breadcrumbs() { ?>
		<!-- breadcrumbs -->
		<div class="col-12 mb-4">
			<?php  
				$args = array(
					'delimiter'  => null,
					'wrap_before'  => '<ol class="breadcrumb bg-light small shadow-sm">',
					'wrap_after' => '</ol>',
					'before'   => '<li class="breadcrumb-item">',
					'after'   => '</li>',
					//'home'    => null
				);
			?>
			<?php woocommerce_breadcrumb( $args ); ?>
		</div>
		<!-- /.breadcrumbs -->
	<?php
	}
}
if ( ! function_exists( 'b4store_page_header' ) ) {
	/**
	 * Page header
	 */
	function b4store_page_header() { 
		$post = get_post();
		$cart_id = wc_get_page_id( 'cart' );
		if( $post->ID !== $cart_id ):	// не показываем заголовок в корзине (уже есть в cart.php)
	?>
		<header class="col-12 py-4 text-center mt-0 mb-3">
			<h1 class="text-kp-green font-weight-bold"><?= the_title() ?></h1>
			<p class="wist-sep-white my-3"></p>
		</header>
	<?php
		endif;
	}
}
if ( ! function_exists( 'b4store_page_content' ) ) {
	/**
	 * Page content
	 */
	function b4store_page_content() { ?>
		<div class="row my-3">
			<div class="col-12 p-4">
				<?= the_content() ?>
			</div>
		</div>
	<?php
	}
}

/**
* Posts functions
*/
if ( ! function_exists( 'b4store_post_header' ) ) {
	/**
	 * Post header
	 */
	function b4store_post_header() { 
		?>
		<header class="d-block p-3 border-bottom mb-4">
				<?php
					if ( is_single() ) {
						the_title( '<h1 class="text-kp-green font-weight-bold">', '</h1>' );
					} else {
						the_title( sprintf( '<h2 class="text-kp-green font-weight-bold"><a href="%s" rel="bookmark" class="text-kp-green">', esc_url( get_permalink() ) ), '</a></h2>' );
					}
				?>
				<i class="fa fa-history mr-2 text-warning"></i><span class="text-kp-dark-green"><?php echo get_the_date('d-m-Y'); ?></span>
		</header>
	<?php
	}
}
if ( ! function_exists( 'b4store_post_content' ) ) {
	/**
	 * Post content
	 */
	function b4store_post_content() { 
		/**
		 * Functions hooked in to b4store_post_content_before action.
		 *
		 * @hooked b4store_post_thumbnail - 10
		 */
		//do_action( 'b4store_post_content_before' );
		?>
		<div class="d-block">
		<?php
		the_content(
			sprintf(
				/* translators: %s: post title */
				'<p class="btn btn-outline-success">'.__( 'Читать далее... %s', 'b4store' ).'</p>',
				'<span class="screen-reader-text">' . get_the_title() . '</span>'
			)
		);

		//do_action( 'b4store_post_content_after' );

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'b4store' ),
				'after'  => '</div>',
			)
		);
		?>
		</div>
		
		<?php
	}
}

/**
* Single Post functions
*/
if ( ! function_exists( 'b4store_single_post_header' ) ) {
	/**
	 * Single Post header
	 */
	function b4store_single_post_header() { 
		?>
		<header class="text-center py-2 mt-3">
			<?php
				if ( is_single() ) {
					the_title( '<h1 class="text-kp-green font-weight-bold">', '</h1>' );
				} else {
					the_title( sprintf( '<h2 class="text-kp-green font-weight-bold"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
				}
			?>
			<p class="wist-sep-white mt-3 mb-3"></p>
		</header>
	<?php
	}
}
if ( ! function_exists( 'b4store_single_post_content' ) ) {
	/**
	 * Single Post content
	 */
	function b4store_single_post_content() { 
		/**
		 * Functions hooked in to b4store_single_post_content_before action.
		 *
		 * @hooked b4store_post_thumbnail - 10
		 */
		//do_action( 'b4store_single_post_content_before' );
		?>
		<div class="text-center shadow-sm p-4">
		<?php
		the_content(
			sprintf(
				/* translators: %s: post title */
				'<p class="btn btn-outline-success">'.__( 'Читать далее... %s', 'b4store' ).'</p>',
				'<span class="screen-reader-text">' . get_the_title() . '</span>'
			)
		);

		//do_action( 'b4store_single_post_content_after' );

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'b4store' ),
				'after'  => '</div>',
			)
		);
		?>
		</div>
		
		<?php
	}
}
/**
 * Dealers Single Page functions
 */
if ( ! function_exists( 'b4store_dealer_single_open' ) ) {
	/**
	 * Dealer Single Open Container
	 */
	function b4store_dealer_single_open() { 	
		?>
		<div class="col-12 col-md-4 p-3 card border-0">
			<div class="card-body border">
	<?php
	}
}
if ( ! function_exists( 'b4store_dealer_single_header' ) ) {
	/**
	 * Dealer Single Page Header
	 */
	function b4store_dealer_single_header() { 	
		?>
		<h5 class="card-title">
			<?= the_title() ?>
		</h5><!-- ./ card-title -->
	<?php
	}
}
if ( ! function_exists( 'b4store_dealer_single_content' ) ) {
	/**
	 * Dealer Single Page Content
	 */
	function b4store_dealer_single_content() { 	
		?>
		<div class="card-text">
			<?= the_content() ?>
		</div><!-- ./ card-text -->
		</div> <!-- ./ card-body -->
	<?php
	}
}
if ( ! function_exists( 'b4store_dealer_single_footer' ) ) {
	/**
	 * Dealers Single Page Footer (Feedback)
	 */
	function b4store_dealer_single_footer() { 	
		?>
		<div class="card-footer bg-white border">
			<a href="/feedback" class="btn btn-outline-success mt-3">Оставить отзыв</a>
		</div>
	<?php
	}
}
if ( ! function_exists( 'b4store_dealer_single_close' ) ) {
	/**
	 * Dealer Single Close Container
	 */
	function b4store_dealer_single_close() { 	
		?>
		</div> <!-- ./ col card -->
	<?php
	}
}

/**
* Sidebar functions
*/
if ( ! function_exists( 'b4store_sidebar_open' ) ) {
	/**
	 * Sidebar open container
	 */
	function b4store_sidebar_open() { 
		?>
		<div class="d-none d-md-block col-12 col-md-3 px-2">
            <div class="row">
	<?php
	}
}
if ( ! function_exists( 'b4store_sidebar_catalog_menu' ) ) {
	/**
	 * Sidebar catalog menu
	 */
	function b4store_sidebar_catalog_menu() { 
		global $wp_query;
		$category = $wp_query->get_queried_object(); 
		$children = get_term_children( $category->term_id,  'product_cat' );

		$cat_args = array(
			'orderby'    => 'name',
			'order'      => 'asc',
			'hide_empty' => true,
			'exclude' => $exclude_array,
			'count' => true,
			'pad_counts' => true,
			'parent' => 0,
		);
		$product_categories = get_terms( 'product_cat', $cat_args );
		// link for href in a id="heading-...  - get_term_link( $cat->term_id )
		?>
	
		<div class="col-12">
			<h4 class="mt-4 mb-3 pb-4 text-kp-green border-bottom">Категории товаров</h4>
			<ul id="accordion-catalog-menu" class="accordion list-group p-0 m-0 mb-4">
				<?php if( !empty($product_categories) && !is_wp_error( $product_categories )):?>
					<?php foreach( $product_categories as $key => $cat): 
						$child = get_term_children( $cat->term_id,  'product_cat' );
						if( !empty($child) ): ?>
							<li class="list-group-item d-flex justify-content-between align-items-center border-0 px-1" data-toggle="collapse" data-target="#collapse-<?= $cat->term_id ?>" aria-expanded="false" aria-controls="collapse-<?= $cat->term_id ?>">
								<a id="heading-<?= $cat->term_id ?>" class="text-dark <?= $cat->term_id === $category->term_id ? 'kp-active' : ''?>" href="#">
									<i class="fa <?= $cat->term_id === $category->term_id ? 'fa-folder-open' : 'fa-folder'?> mr-3 text-kp-yellow"></i>
									<?= $cat->name ?>
									<i class="fa fa-angle-down ml-1 text-kp-green"></i>
								</a>
								<span class="badge <?= $cat->term_id === $category->term_id ? 'badge-success' : 'badge-warning'?> badge-pill"><?= $cat->count ?></span>
							</li>
								<ul class="list-group p-0 m-0 mb-4 ml-4 collapse" id="collapse-<?= $cat->term_id ?>" aria-labelledby="heading-<?= $cat->term_id ?>" data-parent="#accordion-catalog-menu">
								<?php
									$sub_cat_args = $cat_args;
									$sub_cat_args['parent'] = $cat->term_id;
									$sub_categories = get_terms( 'product_cat', $sub_cat_args );

									if( !empty($sub_categories) && !is_wp_error( $sub_categories ) ):
										foreach( $sub_categories as $key => $sub_cat ): $sub_cat->term_id; ?>
											<li class="list-group-item d-flex justify-content-between align-items-center border-0 px-1">
												<a class="text-dark <?= $sub_cat->term_id === $category->term_id ? 'kp-active' : ''?>" href="<?= get_term_link( $sub_cat->term_id ) ?>">
													<i class="fa <?= $sub_cat->term_id === $category->term_id ? 'fa-folder-open' : 'fa-folder'?> mr-3 text-kp-yellow"></i>
													<?= $sub_cat->name ?>
												</a>
												<span class="badge <?= $sub_cat->term_id === $category->term_id ? 'badge-success' : 'badge-warning'?> badge-pill"><?= $sub_cat->count ?></span>
											</li>
										<?php endforeach; ?>
									<?php endif; ?>
								</ul>
						<?php else: ?>
							<li class="list-group-item d-flex justify-content-between align-items-center border-0 px-1">
								<a class="text-dark <?= $cat->term_id === $category->term_id ? 'kp-active' : ''?>" href="<?= get_term_link( $cat->term_id ) ?>">
									<i class="fa <?= $cat->term_id === $category->term_id ? 'fa-folder-open' : 'fa-folder'?> mr-3 text-kp-yellow"></i>
									<?= $cat->name ?>
								</a>
								<span class="badge <?= $cat->term_id === $category->term_id ? 'badge-success' : 'badge-warning'?> badge-pill"><?= $cat->count ?></span>
							</li>
						<?php endif; ?>
					<?php endforeach; ?>
				<?php endif; ?>
			</ul>
		</div>
	<?php
	}
}
if ( ! function_exists( 'b4store_sidebar_ads' ) ) {
	/**
	 * Sidebar ads blocks
	 */
	function b4store_sidebar_ads() { 
		?>
		<div class="col-12 mb-4">
			<a href="#">
				<img src="<?= get_template_directory_uri() ?>/assets/images/action1.jpg" alt="" class="img-fluid rounded shadow p-1 border">
			</a>
		</div>
		<div class="col-12 mb-4">
			<a href="#">
				<img src="<?= get_template_directory_uri() ?>/assets/images/action1.jpg" alt="" class="img-fluid rounded shadow p-1 border">
			</a>
		</div>
	<?php
	}
}
if ( ! function_exists( 'b4store_sidebar_close' ) ) {
	/**
	 * Sidebar close container
	 */
	function b4store_sidebar_close() { 
		?>
			</div>	<!-- ./ row -->
		</div>	<!-- ./ col -->
	<?php
	}
}

/**
* Catalog / Shop / Category functions
*/
if ( ! function_exists( 'b4store_catalog_open' ) ) {
	/**
	 * Catalog open container
	 */
	function b4store_catalog_open() { 
		?>
		<div class="col-12 col-md-9 px-4 pl-md-5 pr-md-2">
            <div class="row">
	<?php
	}
}
if ( ! function_exists( 'b4store_catalog_header' ) ) {
	/**
	 * Catalog header
	 */
	function b4store_catalog_header() { ?>
		<?php if ( is_shop() ): ?>
			<header class="col-12 mt-3 mb-4">
				<h1 class="text-kp-green text-center">Каталог товаров</h1>
				<p class="wist-sep-white mt-5 mb-4"></p>
			</header>
		<?php endif; ?>
		<?php if ( is_product_category() ):
			global $wp_query;
			$cat = $wp_query->get_queried_object();    
			$thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true ); 
			$image = wp_get_attachment_url( $thumbnail_id );
		?>
			<header class="col-12 mt-3 mb-4">
				<h1 class="text-kp-green"><?= $cat->name ?></h1>
				<?php if ( !empty($cat->description) ): ?>
					<div class="my-4 text-justify">
						<?php if(isset($image)):?>
							<img src="<?= $image ?>" alt="<?= $cat->name ?>" class="img-fluid rounded shadow-sm border float-left w-25 mr-4 mb-2 p-3">
						<?php endif; ?>
						<?= $cat->description ?>
					</div>
					<p class="wist-sep-white mt-5 mb-4"></p>
				<?php endif; ?>
			</header>
		<?php endif; ?>
	<?php
	}
}
if ( ! function_exists( 'b4store_catalog_content' ) ) {
	/**
	 * Catalog content (empty...)
	 */
	function b4store_catalog_content() { 		
		?>

	<?php
	}
}
if ( ! function_exists( 'b4store_child_categories_list' ) ) {
	/**
	 * Catalog's child categories list
	 */
	function b4store_child_categories_list() { 
		?>
		<?php 
			global $wp_query;
			$category = $wp_query->get_queried_object(); 
			$children = get_term_children( $category->term_id,  'product_cat' );

			$cat_args = array(
				'orderby'    => 'name',
				'order'      => 'asc',
				'hide_empty' => true,
				'exclude' => $exclude_array,
				'count' => true,
				'pad_counts' => true,
				'parent' => !empty( $children ) && !is_wp_error( $children ) ? $category->term_id : 0,
			);
			
			$product_categories = get_terms( 'product_cat', $cat_args );

			if( !empty($product_categories) && !is_wp_error( $product_categories ) && $cat_args['parent'] !== 0 || is_shop() ):?>
				<div class="row my-4 p-3">
					<?php
						foreach ($product_categories as $key => $category):
							$thumb_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true );
							$category_img = wp_get_attachment_url(  $thumb_id );
					?>
						<div class="col-md-4 p-3">
							<div class="card h-100 border-success shadow">
								<div class="card-body">
									<a href="<?= get_term_link($category) ?>">
										<img src="<?= $category_img ?>" class="card-img-top img-fluid" alt="<?= $category->name ?>">
									</a>
								</div>
								<div class="card-footer clearfix bg-kp-green border-success">
									<h5><a href="<?= get_term_link($category) ?>" class="text-white"><?= $category->name ?> <span class="badge badge-pill badge-warning"><?= $category->count ?></span></a></h5>
								</div>
							</div>
						</div> <!-- ./ col-md-3 -->
					<?php endforeach; ?>
				</div> <!-- ./ row -->
			<?php endif; ?>
	<?php
	}
}
if ( ! function_exists( 'b4store_products_list' ) ) {
	/**
	 * Catalog products list
	 */
	function b4store_products_list() { 
		?>
		<div class="row my-4 p-3">
		<?php
			// получаем текущую категорию
			global $wp_query;
			$category = $wp_query->get_queried_object();
			// создаем фильтр товаров по категории
			$args = array(
				'post_type' => 'product',
				'post_status' => 'publish',
				'posts_per_page' => $posts_per_page,
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
				'product_cat' => $category->slug,
				);
			// выводим товары категории в цикле
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
				<div class="col-lg-4 col-md-6 mb-4">
					<div class="card h-100 text-center shadow-sm">
						<a href="<?= get_permalink($product->get_id()) ?>">
							<?= $product->get_image('woocommerce_thumbnail', array('class' => 'card-img-top img-fluid')) ?>
						</a>
						<div class="card-body">
							<h4 class="card-title mb-4">
								<a href="<?= get_permalink($product->get_id()) ?>" class="text-dark"><?= $product->get_name() ?></a>
							</h4>
							<h5 class="card-subtitle mb-2">
								<b class="text-kp-green"><?= $product->get_price() ?></b>
								<i class="fa fa-ruble-sign text-muted small"></i>
							</h5>
						</div>
						<div class="card-footer bg-white clearfix">
							<?php if($product->is_type('variable')): ?>
								<a href="<?= get_permalink($product->get_id()) ?>" class="btn btn-kp-green px-3 py-2 shadow-sm mt-2 mb-1 btn-sm">
									<i class="fas fa-cart-arrow-down mr-2"></i>Выбрать
								</a>
							<?php else: ?>
								<a href="?add-to-cart=<?= $product->get_id() ?>" 
									class="btn btn-warning px-3 py-2 shadow-sm mt-2 mb-1 btn-sm --button product_type_simple add_to_cart_button ajax_add_to_cart"
									data-quantity="1" 
									data-product_id="<?= $product->get_id() ?>" 
									data-product_sku="<?= $product->get_sku() ?>" 
									aria-label="Добавить <?= $product->get_name() ?> в корзину"
									rel="nofollow" 
									data-toggle="modal" data-target="#added-to-cart" 
									>
									<i class="fa fa-cart-plus mr-2"></i>В корзину
								</a>
							<?php endif; ?>
							<a href="#" class="btn btn-link btn-sm text-kp-green text-kp-underline" data-toggle="modal" data-target="#oneClickOrder">Купить в 1 клик</a>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		</div> <!-- ./ row -->
	<?php
	}
}

if ( ! function_exists( 'b4store_pagination' ) ) {
	/**
	 * Pagination
	 */
	function b4store_pagination() { 
		?>
		<div class="col-12 my-2">
		<?php 
		
			global $wp_query;

			$args = array(
				'show_all'     => false, // показаны все страницы участвующие в пагинации
				'end_size'     => 1,     // количество страниц на концах
				'mid_size'     => 1,     // количество страниц вокруг текущей
				'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
				'prev_text'    => __('«'),
				'next_text'    => __('»'),
				'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
				'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
				'screen_reader_text' => __( 'Page navigation' ),
			);

			add_filter('navigation_markup_template', 'b4store_navigation_template', 10, 2 );
			function b4store_navigation_template( $template, $class ){
				return '
				<nav class="navigation %1$s" role="navigation">
					<div class="nav-links">%3$s</div>
				</nav>    
				';
			}

			the_posts_pagination( $args );

		?>
		</div>
	<?php
	}
}
if ( ! function_exists( 'b4store_catalog_close' ) ) {
	/**
	 * Catalog close container
	 */
	function b4store_catalog_close() { 
		?>
			</div> <!-- /.row -->
        </div> <!-- /.col-12 -->
	<?php
	}
}

/**
* Product functions
*/
if ( ! function_exists( 'b4store_product_open' ) ) {
	/**
	 * Product open container
	 */
	function b4store_product_open() { ?>
		<div class="col-12 mb-5">
            <div class="row">
	<?php
	}
}
if ( ! function_exists( 'b4store_product_header' ) ) {
	/**
	 * Product header
	 */
	function b4store_product_header() {	
		$product = wc_get_product( get_the_ID() );
		?>
		<header class="col-12 mb-2">
			<h1 class="my-4 text-kp-green"><?= $product->get_name() ?></h1>
			<p class="float-left">Артикул: 
				<b>
					<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
						<?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?>
					<?php endif; ?>
				</b>
			</p>
			<?php if (get_post_meta( get_the_ID(), '_stock_status', true) == 'outofstock'):?>
				<p class="text-danger float-right"><i class="fa fa-check mr-2"></i>нет в наличии</p>
			<?php else: ?>
				<p class="text-success float-right"><i class="fa fa-check mr-2"></i>в наличии</p>
			<?php endif; ?>
			
		</header>
	<?php
	}
}
if ( ! function_exists( 'b4store_product_left_column_open' ) ) {
	/**
	 * Product left column (1/3) open
	 */
	function b4store_product_left_column_open() { 
		?>
		<!-- left 1/3 -->
		<div class="col-12 col-md-4 p-2">
	<?php
	}
}
if ( ! function_exists( 'b4store_product_images' ) ) {
	/**
	 * Product images
	 */
	function b4store_product_images() { 
		$product = wc_get_product( get_the_ID() );
		$image_url = wp_get_attachment_image_url( $product->get_image_id(), 'full' );
		?>
		<div class="m-2 border rounded shadow-sm">
			<!-- картинка товара в lightbox -->
			<a href="<?= $image_url ?>"
				data-lightbox="image-item" 
				data-title="<?= $product->get_name() ?>">
				<?= $product->get_image('woocommerce_cart_item_thumbnail', array('class' => 'img-fluid p-4', 'role' => 'presentation', 'alt' => $product->get_name())) ?>
			</a>
		</div>
	<?php
	}
}
if ( ! function_exists( 'b4store_product_social' ) ) {
	/**
	 * Product social buttons
	 */
	function b4store_product_social() { 
		?>
		<!-- кнопки соцсетей Яндекс -->
		<div class="social-buttons text-center p-3 mb-2">
			<script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
			<script src="https://yastatic.net/share2/share.js"></script>
			<div class="ya-share2"
				data-services="vkontakte,facebook,odnoklassniki,twitter,viber,whatsapp,telegram">
			</div>
		</div>
	<?php
	}
}
if ( ! function_exists( 'b4store_product_left_column_close' ) ) {
	/**
	 * Product left column (1/3) close
	 */
	function b4store_product_left_column_close() { 
		?>
		</div> <!-- ./ left 1/3 -->
	<?php
	}
}
if ( ! function_exists( 'b4store_product_right_column_open' ) ) {
	/**
	 * Product right column (2/3) open
	 */
	function b4store_product_right_column_open() { 
		?>
		<!-- right 2/3 -->
		<div class="col-12 col-md-8 p-2">
            <div class="row my-2">
	<?php
	}
}
if ( ! function_exists( 'b4store_product_buy' ) ) {
	/**
	 * Product buy tools (price, qty, add-to-cart, one-click-order)
	 */
	function b4store_product_buy() { 
		global $product; 
		$product = wc_get_product( get_the_ID() );
		if ( ! $product->is_purchasable() ) {
			return;
		} 
		?>

		<?php // product is simple
		if( $product->is_type('simple')): ?>

			<div class="col-12 col-md-3 p-3 text-center">
				<!-- цена товара -->
				<h2 class="py-0">
					<b id="item-price" class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) );?> text-kp-green"><?= $product->get_price() ?></b>
					<i class="fa fa-ruble-sign small text-secondary ml-1"></i>
				</h2>
			</div>
			
			<!-- количество товара  (- 1 +) -->
			<?php if ( $product->is_in_stock() ) : ?>
				<div class="col-12 col-md-3 py-0 pl-4 m-0 text-center border-right">
					<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>
					<form id="single-product-add-to-cart" class="cart mt-3" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
						<?php 
							do_action( 'woocommerce_before_add_to_cart_button' );
							do_action( 'woocommerce_before_add_to_cart_quantity' );
							
							woocommerce_quantity_input( array(
								'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
								'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
								'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
								'classes'     => apply_filters( 'woocommerce_quantity_input_classes', array( 'input-text', 'qty-single', 'text', 'form-control','text-center','bg-white','font-weight-bold','w-75 border-success pl-4', ), $product ),
							) );

							do_action( 'woocommerce_after_add_to_cart_quantity' ); 
						?>
				</div> <!-- ./ col -->
				<div class="col-12 col-md-6 py-3 text-center text-md-right">
					<!-- кнопки купить и заказать в 1 клик -->
					<a href="?add-to-cart=<?= $product->get_id() ?>" 
						class="btn btn-kp-yellow py-2 px-4 mr-2 --button product_type_simple add_to_cart_button ajax_add_to_cart"
						data-quantity="1" 
						data-product_id="<?= $product->get_id() ?>" 
						data-product_sku="<?= $product->get_sku() ?>" 
						aria-label="Добавить <?= $product->get_name() ?> в корзину"
						rel="nofollow" 
						data-toggle="modal" data-target="#added-to-cart" 
						>
						<i class="fa fa-cart-plus mr-2"></i>В корзину
					</a>

					<a href="#" class="btn btn-outline-success" data-toggle="modal" data-target="#oneClickOrder">Купить в 1 клик</a>
					
					<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
				</form>

				<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
			</div> <!-- ./ col -->
			<?php endif; ?>		<!-- </div> ./col -->
		<?php endif; // is simple ?>

		<?php // product is variable
		if( $product->is_type('variable')): 
			//do_action('woocommerce_variable_add_to_cart');
			$variations = $product->get_available_variations();
			?>
			<div class="col-12 px-3 pl-md-4 pr-md-3">
				<div class="row mx-1 shadow-sm border-top">
					<?php
					foreach ($variations as $key => $variation):
						$variation_obj = wc_get_product($variation['variation_id']);
					?>
						<div class="col-2 col-md-1 border-bottom p-2 pt-3 text-center">
							<span class="badge badge-pill badge-light shadow-sm py-1 px-2 mr-2"><?= ($key+1) ?></span>
						</div>
						<div class="col-10 col-md-4 border-bottom p-2 pt-3">
							<?= esc_html($variation_obj->get_name()) ?>
							<?= $variation_obj->attribute_summary ?>
						</div>
						<div class="col-3 col-md-2 border-bottom p-2 pt-3 text-center">
							<p><?= $variation_obj->get_price_html() ?></p>
						</div>
						<div class="variation_quantity_input col-3 col-md-2 border-bottom p-2 text-right">
							<?php
							woocommerce_quantity_input( array(
								'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
								'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
								'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
								'classes'     => apply_filters( 'woocommerce_quantity_input_classes', array( 'input-text', 'qty-single', 'text', 'form-control','text-center','bg-white','font-weight-bold','w-75 border-success pl-md-4', ), $product ),
							) );
							?>
						</div>
						<div class="col-6 col-md-3 border-bottom p-2 text-right">
							<a href="?add-to-cart=<?= $variation_obj->get_id() ?>" 
								class="btn btn-kp-yellow mx-2 --button product_type_simple add_to_cart_button ajax_add_to_cart"
								data-quantity="1" 
								data-product_id="<?= $variation_obj->get_id() ?>" 
								data-product_sku="<?= $variation_obj->get_sku() ?>" 
								aria-label="Добавить <?= $variation_obj->get_name() ?> в корзину"
								rel="nofollow" 
								data-toggle="modal" data-target="#added-to-cart" 
								>
								<i class="fa fa-cart-plus mr-2"></i>В корзину
							</a>
						</div>
					<?php endforeach; ?>
				</div> <!-- ./ row -->
			</div> <!-- ./ col -->
		<?php endif; // is variable ?>
	<?php
	}
}
if ( ! function_exists( 'b4store_product_categories' ) ) {
	/**
	 * Product's categories list
	 */
	function b4store_product_categories() { 
		global $product;
		$include_array = wc_get_product_term_ids( $product->get_id(), 'product_cat' );
		$cat_args = array(
			'orderby'    => 'name',
			'order'      => 'asc',
			'hide_empty' => true,
			'include'	=> $include_array,
			'exclude' => $exclude_array,
		);
		$product_categories = get_terms( 'product_cat', $cat_args );
		
		if( !empty($product_categories) && !is_wp_error( $product_categories ) ):?>
			<div class="col-12 pl-4 pr-3 mt-4 mb-4">
				<ul class="list-group list-group-horizontal-sm text-left shadow-sm py-2 px-2 m-0">
				<?php foreach ($product_categories as $key => $category):
					?>
					<li class="list-group-item p-0 m-0 border-0">
						<a href="<?= get_term_link($category->slug, 'product_cat') ?>" class="btn btn-link text-kp-green text-kp-underline">
							<?= $category->name ?>
						</a>
					</li>
				<?php endforeach; ?>
			</ul>
		</div> <!-- ./col -->
	<?php
		endif;
	}
}
if ( ! function_exists( 'b4store_product_content' ) ) {
	/**
	 * Product content, properties ...
	 */
	function b4store_product_content() { 
		global $product;
		//$description = $product->get_description();
		if( $description !== '') {
			?>
				<div class="item-text col-12 px-3 pl-4 mb-4 text-justify">
					<!-- описание товара -->
					<p><?= $product->get_description() ?></p>
					<!-- /.описание товара -->
				</div>
			<?php
			}
		?>

		<div class="item-property-table col-12 pl-4 mb-2 pr-3">
			<!-- атрибуты товара -->
			<?php do_action( 'woocommerce_product_additional_information', $product ); ?>
			<?php //$attributes = wc_display_product_attributes( $product ); ?>
			<?php //$product->list_attributes(); ?>
			<!-- /.атрибуты товара -->
		</div>	
			
	<?php
	}
}
if ( ! function_exists( 'b4store_products_related_open' ) ) {
	/**
	 * Product related list open container
	 */
	function b4store_products_related_open() { ?>
		<div class="col-12 mb-3 p-2 text-center">
	<?php
	}
}
if ( ! function_exists( 'b4store_products_related_header' ) ) {
	/**
	 * Product related header
	 */
	function b4store_products_related_header() { ?>
		<h3 class="text-center wist-sep-white mb-4 pb-3">
			<?php esc_html_e( 'Related products', 'woocommerce' ); ?>
		</h3>
	<?php
	}
}
if ( ! function_exists( 'b4store_products_related' ) ) {
	/**
	 * Product related list
	 */
	function b4store_products_related() {

		$args = array(
			'post_type' => 'product',
			'post_status' => 'publish',
			'posts_per_page' => 4,
			'orderby' => 'rand',
			//'exclude' => array( get_the_ID() ),
			);

		$loop = new WP_Query( $args ); ?> 

		<div class="card-deck mb-4">
			<?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; 
				
			?>
				<div class="card border shadow-sm">
					<a href="<?= get_permalink($product->get_id()) ?>">
						<?= $product->get_image('woocommerce_thumbnail', array('class' => 'card-img-top', 'alt' => $product->get_name())) ?>
					</a>
					<div class="card-body">
						<h5 class="card-title">
							<a href="<?= get_permalink($product->get_id()) ?>" class="text-kp-green">
								<?= $product->get_name() ?>
							</a>
						</h5>
						<h5>
							<b class="text-kp-green"><?= $product->get_price() ?></b>
							<i class="fa fa-ruble-sign small text-secondary"></i>
						</h5>
					</div>
					<div class="card-footer bg-transparent border-0 pb-4">
						<a href="?add-to-cart=<?= $product->get_id() ?>" 
							class="btn btn-kp-yellow py-2 px-4 mr-2 --button product_type_simple add_to_cart_button ajax_add_to_cart"
							data-quantity="1" 
							data-product_id="<?= $product->get_id() ?>" 
							data-product_sku="<?= $product->get_sku() ?>" 
							aria-label="Добавить <?= $product->get_name() ?> в корзину"
							rel="nofollow" 
							data-toggle="modal" data-target="#added-to-cart" 
							>
							<i class="fa fa-cart-plus mr-2"></i>В корзину
						</a>
						<!--<button class="btn btn-kp-yellow py-2 px-4 mr-2"><i class="fa fa-cart-plus mr-2"></i>В корзину</button>-->
					</div>
				</div> <!-- ./card -->
			<?php endwhile; ?>
		</div> <!-- ./ card-deck -->		
	<?php
	}
}
if ( ! function_exists( 'b4store_products_related_close' ) ) {
	/**
	 * Product related list close container
	 */
	function b4store_products_related_close() { ?>
		</div> <!-- ./ col -->
	<?php
	}
}

if ( ! function_exists( 'b4store_product_right_column_close' ) ) {
	/**
	 * Product right column (2/3) close
	 */
	function b4store_product_right_column_close() { 
		?>
			</div>	<!-- /.row -->
		</div>	<!-- /.col-12 -->
		<!-- ./ right 2/3 -->
	<?php
	}
}
if ( ! function_exists( 'b4store_product_close' ) ) {
	/**
	 * Product close container
	 */
	function b4store_product_close() { ?>
			</div> <!-- ./ col -->
		</div> <!-- ./ row -->
	<?php
	}
}

/**
* Footer functions
*/

if ( ! function_exists( 'b4store_footer_blocks' ) ) {
	/**
	 * Footer blocks
	 */
	function b4store_footer_blocks() { ?>
		<div class="col-12 col-md-4 footer-block">
			<h5 class="text-kp-green">Меню</h5>
			<ul>
				<li><a href="<?= home_url() ?>">Главная</a></li>
				<li><a href="<?= get_permalink( wc_get_page_id( 'shop' ) ) ?>">Каталог товаров</a></li>
				<li><a href="/category/news">Новости</a></li>
				<li><a href="/about">О компании</a></li>
				<li><a href="/category/dealers">Региональное присутствие</a></li>
				<li><a href="/contacts">Контакты, схема проезда</a></li>
			</ul>
		</div>
		<div class="col-12 col-md-4 footer-block">
			<h5 class="text-kp-green">Каталог товаров</h5>
			<ul>
				<?php 
				$cat_args = array(
					'orderby'    => 'name',
					'order'      => 'asc',
					'hide_empty' => true,
					'exclude' => $exclude_array,
					'parent' => 0,
				);
				
				$product_categories = get_terms( 'product_cat', $cat_args );
				
				if( !empty($product_categories) && !is_wp_error( $product_categories ) ):
					foreach ($product_categories as $key => $category):
				?>
					<li>
						<a href="<?= get_term_link($category) ?>">
							<?= $category->name ?>
						</a>
					</li>
				<?php
					endforeach;
				endif;
				?>
			</ul>
		</div>
		<div class="col-12 col-md-4 footer-block">
			<h5 class="text-kp-green">Контакты</h5>
			<ul>
				<li class="text-uppercase">
					<img src="<?= get_template_directory_uri() ?>/assets/images/logo-20x20.png" alt="Комплект Премьер" class="img-fluid mr-1">
					Комплект Премьер
				</li>
				<li>
					<i class="fa fa-phone mr-2 text-secondary"></i>
					8 (495) 510-53-53
				</li>
				<li>
					<i class="fa fa-envelope mr-2 text-secondary"></i>
					<a href="mailto:info@komplekt-premier.ru">info@komplekt-premier.ru</a>
				</li>
				<li>
					<i class="fa fa-map-marker-alt mr-2 text-secondary"></i>
					Московская область, г. Щелково, ул. Заречная 149
				</li>
				<li>
					<a href="https://www.instagram.com/komplektpremier1/" 
						target="_blank"
						title="Наша страница в Instagram"
						class="text-decoration-none"
					>
						<i class="fab fa-instagram fa-2x"></i>
					</a>
					<a href="https://www.facebook.com/KomplektPremier1/?eid=ARAjvZCG4yP5s987Aa3hL2InkSGHkPAB2QNKindqnkbpey3O86tysH36lySSuhuI7bHY_NzH7_gYIV2i" 
						target="_blank" 
						title="Наша страница в Facebook"
						class="text-decoration-none"
					>
						<i class="fab fa-facebook fa-2x ml-2"></i>
					</a>
				</li>
			</ul>
		</div>	
	<?php
	}
}

if ( ! function_exists( 'b4store_footer_copyright' ) ) {
	/**
	 * Footer copyright
	 */
	function b4store_footer_copyright() { ?>
		<div id="copyright" class="col-12 text-center text-white mt-4">
			<p class="m-0 mb-1">
				&copy; 2019 <a href="https://komplekt-premier.ru/" class="text-kp-green mx-2">Комплект Премьер</a>
				Декоры для эксклюзивных интерьеров и мебели
			</p>
			<p class="m-0 small"><a href="/privacy">Положение об обработке персональных данных</a></p>
		</div>
	<?php
	}
}

/**
* Modals functions
*/
if ( ! function_exists( 'b4store_feedback_modal' ) ) {
	/**
	 * Feedback modal
	 */
	function b4store_feedback_modal() { ?>
		<!-- feedback modal -->
		<div id="feedback-modal" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-md" role="document">
				<form>
					<div class="modal-content">
						<div class="modal-header text-light bg-kp-green">
							<h5 class="modal-title"><i class="fa fa-phone mr-2 text-kp-yellow"></i>Заказать обратный звонок</h5>
							<button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body text-center px-5">
							<div class="form-group">
								<p class="small bg-light p-3 text-center">Отправьте ваш номер телефона и наш менеджер свяжется с Вами в течение рабочего дня</p>
								<input type="text" class="form-control form-control-lg" id="input-feedback-phone" name="input-feedback-phone" placeholder="+7 (___) ___-____" required>
							</div>
							<div class="form-group">
								<div class="form-check">
									<input checked="checked" class="form-check-input" type="checkbox" id="policy-agree-feedback">
									<label class="form-check-label small" for="policy-agree"> 
										Согласен с условиями <a href="/policy" target="_blank" class="text-kp-green">Политики конфиденциальности</a>
									</label>
								</div>
							</div>
						</div>
						<div class="modal-footer text-center py-4 bg-light">
							<button id="btn-feedback-submit" name="btn-feedback-submit" type="submit" class="btn btn-kp-yellow text-kp-green btn-lg px-5 mx-auto">
								<i class="fa fa-envelope mr-2"></i>
								Отправить
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- ./ feedback modal -->
	<?php
	}
}
if ( ! function_exists( 'b4store_one_click_order_modal' ) ) {
	/**
	 * One click order modal
	 */
	function b4store_one_click_order_modal() { ?>
		<!-- one click order modal -->
		<div id="oneClickOrder" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<form id="one-click-order-form" action="" method="POST">
					<div class="modal-content">
						<div class="modal-header bg-kp-green">
							<h5 class="modal-title text-light"><i class="fa fa-check mr-2 text-kp-yellow"></i>Купить в 1 клик</h5>
							<button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body text-center">
							<img id="one-click-img" src="" alt="" class="img-fluid mb-3" style="max-width:300px;">
							<h4 id="one-click-name" class="p-1 mb-2">Товар</h4>
							<input type="hidden" id="input-item-name" name="input-item-name" />
							<h5><span id="one-click-price">0</span> руб.</h5>
							<input type="hidden" id="input-item-price" name="input-item-price" />
							<div class="form-group">
								<p class="small bg-light p-2 text-center">Введите ваш номер телефона и наш менеджер свяжется с Вами для уточнения деталей заказа</p>
								<input type="text" class="form-control form-control-lg" id="input-one-click-order" name="input-one-click-order" placeholder="+7 (___) ___-____" required>
							</div>
							<div class="form-group">
								<div class="form-check">
									<input checked class="form-check-input" type="checkbox" id="policy-agree-one-click-order">
									<label class="form-check-label small" for="policy-agree-one-click-order">Согласен с условиями <a href="/privacy-policy" target="_blank" class="text-dark">Политики конфиденциальности</a></label>
								</div>
							</div>
						</div>
						<div class="-modal-footer text-center border-top py-3">
							<button type="button" class="btn btn-secondary d-none" data-dismiss="modal">Отмена</button>
							<button id="btn-one-click-order-submit" name="btn-one-click-order-submit" type="submit" class="btn btn-kp-yellow text-dark px-5 btn-lg"><i class="fa fa-check mr-2 text-kp-green"></i>Купить</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- ./ one click order modal -->
	<?php
	}
}
if ( ! function_exists( 'b4store_add_to_cart_message' ) ) {
	/**
	 * Order added to cart message modal
	 */
	function b4store_add_to_cart_message() { ?>
		<!-- modal added-to-cart -->
		<div id="added-to-cart" class="modal fade" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header bg-kp-green text-light">
						<h5 class="modal-title text-light"><i class="fa fa-check mr-2 text-kp-yellow"></i>Товар добавлен в корзину</h5>
						<button type="button" class="close  text-light" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body text-center">
						<div class="row">
							<div class="col-12 py-5 px-2 mb-4 border-bottom">
								<h3><i class="fa fa-check mr-2 text-success"></i>Товар добавлен в корзину</h3>
							</div>
							<div class="col-12 col-md-6 mb-3">
								<a href="<?= get_permalink( wc_get_page_id( 'cart' ) ) ?>" class="btn btn-success px-3">Перейти в корзину</a>
							</div>
							<div class="col-12 col-md-6 mb-3">
								<button type="button" class="btn btn-outline-success" data-dismiss="modal">
									Продолжить покупки
								</button>
							</div>
						</div>
					</div>
					<div class="-modal-footer text-center p-4 border-top d-none">
						<button id="btn-feedback-submit" name="btn-feedback-submit" type="submit" class="btn btn-primary btn-lg">╨Ю╤Б╤В╨░╨▓╨╕╤В╤М ╨╖╨░╤П╨▓╨║╤Г</button>
					</div>
				</div>
			</div>
		</div>
		<!-- ./modal added-to-cart -->

	<?php
	}
}
