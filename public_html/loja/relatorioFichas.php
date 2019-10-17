<?php $voltar = 'sair'; ?>
<?php
if(isset($_POST['idTabela']))
    $_SESSION['idTabela'] = $_POST['idTabela'];
if(isset($_POST['anoItem']))
    $_SESSION['anoItem'] = $_POST['anoItem'];

?>

<!DOCTYPE html>

<!--
<html lang="en" >
<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>
        Metronic | Local Data
    </title>
    <meta name="description" content="Child datatable from local data">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!--end::Web font -->
    <!--begin::Base Styles -->
    <link href="/layout/metronic_v5.0.3/theme/dist/html/default/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
    <link href="/layout/metronic_v5.0.3/theme/dist/html/default/assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Base Styles -->
    <link rel="shortcut icon" href="/layout/metronic_v5.0.3/theme/dist/html/default/assets/demo/default/media/img/logo/favicon.ico" />
</head>
<!-- end::Head -->
<!-- end::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
<!--    --><?php //include '../partes/barraTopo.php'; ?>

    <header class="m-grid__item    m-header "  data-minimize-offset="200" data-minimize-mobile-offset="200" >
        <div class="m-container m-container--fluid m-container--full-height">
            <div class="m-stack m-stack--ver m-stack--desktop">
                <!-- BEGIN: Brand -->
                <img src="http://www.aquifinanciamentos.com.br/2/logo.png" width="630" height="66">
                <!-- END: Brand -->
                <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                    <!-- BEGIN: Horizontal Menu -->


                    <!-- END: Horizontal Menu -->
                    <!-- BEGIN: Topbar -->
                    <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
                        <div class="m-stack__item m-topbar__nav-wrapper">
                            <ul class="m-topbar__nav m-nav m-nav--inline">
                                <li class="m-nav__item m-dropdown m-dropdown--large m-dropdown--arrow m-dropdown--align-center m-dropdown--mobile-full-width m-dropdown--skin-light	m-list-search m-list-search--skin-light"
                                    data-dropdown-toggle="click" data-dropdown-persistent="true" id="m_quicksearch" data-search-type="dropdown">


                                    <?php
                                    if($voltar=='voltar')
                                        echo '<a href="../" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder" style="margin-top: 15px;">Voltar</a>';
                                    else if($voltar=='sair')
                                        echo '<a href="../sair.php" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder" style="margin-top: 15px;">Sair</a>';
                                    else
                                        echo '<a href="/loja" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder" style="margin-top: 15px;">Acesso Loja</a>';
                                    ?>

                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- END: Topbar -->
                </div>
            </div>
        </div>
    </header>

<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">

    <!-- begin::Body -->
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
        <!-- BEGIN: Left Aside -->
        <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
            <i class="la la-close"></i>
        </button>

        <!-- END: Left Aside -->
        <div class="m-grid__item m-grid__item--fluid m-wrapper">


            <!-- BEGIN: Subheader -->
            <div class="m-subheader ">
                <div class="d-flex align-items-center">
                    <div class="mr-auto">
                        <h3 class="m-subheader__title m-subheader__title--separator">
                            Relatório das Fichas
                        </h3>
                        <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                            <li class="m-nav__item m-nav__item--list">
                                <a href="#" class="m-nav__link m-nav__link--icon">
                                    <i class="m-nav__link-icon la la-list"></i>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
            <!-- END: Subheader -->
            <div class="m-content">
                <div class="m-portlet m-portlet--mobile">
                    <div class="m-portlet__body">
                        <!--begin: Search Form -->
                        <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                            <div class="row align-items-center">
                                <div class="col-xl-8 order-2 order-xl-1">
                                    <div class="form-group m-form__group row align-items-center">
                                        <div class="col-md-4">
                                            <div class="m-input-icon m-input-icon--left">
                                                <input type="text" class="form-control m-input" placeholder="Procurar..." id="m_form_search">
                                                <span class="m-input-icon__icon m-input-icon__icon--left">
                                                    <span>
                                                        <i class="la la-search"></i>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="m-input-icon m-input-icon--left">
                                                <select class="filtrarSituacao form-control select2 select2-container select2-container--default select2-container--focus" style="padding-left: 0.3px;">
                                                    <option value="" checked="checked">Filtre por uma situação</option>
                                                    <option value="1" style="background-color: #34bfa3;">Aprovada</option>
                                                    <option value="2" style="background-color: #eaeaea;">Nova</option>
                                                    <option value="3" style="background-color: #ffb822;">Pendências</option>
                                                    <option value="4" style="background-color: #f4516c;">Reprovada</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                    <a href="#" class="btn btn-primary m-btn m-btn--custom m-btn--pill m-btn--icon m-btn--air">
												<span>
													<i class="la la-download"></i>
													<span>
														Imprimir
													</span>
												</span>
                                    </a>
                                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                                </div>
                            </div>
                        </div>
                        <!--end: Search Form -->
                        <!--begin: Datatable -->
                        <div class="m_datatable" id="child_data_local"></div>
                        <!--end: Datatable -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end:: Body -->
    <!-- begin::Footer -->
<!--    <footer class="m-grid__item		m-footer ">-->
<!--        <div class="m-container m-container--fluid m-container--full-height m-page__container">-->
<!--            <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">-->
<!--                <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">-->
<!--							<span class="m-footer__copyright">-->
<!--								2017 &copy; Metronic theme by-->
<!--								<a href="#" class="m-link">-->
<!--									Keenthemes-->
<!--								</a>-->
<!--							</span>-->
<!--                </div>-->
<!--                <div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">-->
<!--                    <ul class="m-footer__nav m-nav m-nav--inline m--pull-right">-->
<!--                        <li class="m-nav__item">-->
<!--                            <a href="#" class="m-nav__link">-->
<!--										<span class="m-nav__link-text">-->
<!--											About-->
<!--										</span>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li class="m-nav__item">-->
<!--                            <a href="#"  class="m-nav__link">-->
<!--										<span class="m-nav__link-text">-->
<!--											Privacy-->
<!--										</span>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li class="m-nav__item">-->
<!--                            <a href="#" class="m-nav__link">-->
<!--										<span class="m-nav__link-text">-->
<!--											T&C-->
<!--										</span>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li class="m-nav__item">-->
<!--                            <a href="#" class="m-nav__link">-->
<!--										<span class="m-nav__link-text">-->
<!--											Purchase-->
<!--										</span>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li class="m-nav__item m-nav__item">-->
<!--                            <a href="#" class="m-nav__link" data-toggle="m-tooltip" title="Support Center" data-placement="left">-->
<!--                                <i class="m-nav__link-icon flaticon-info m--icon-font-size-lg3"></i>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </footer>-->
    <!-- end::Footer -->
</div>
<!-- end:: Page -->

<!-- begin::Scroll Top -->
<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
    <i class="la la-arrow-up"></i>
</div>
<!-- end::Scroll Top -->
<!--begin::Base Scripts -->
<script src="/layout/metronic_v5.0.3/theme/dist/html/default/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
<script src="/layout/metronic_v5.0.3/theme/dist/html/default/assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
<!--end::Base Scripts -->
<!--begin::Page Resources -->
<script src="/layout/metronic_v5.0.3/theme/dist/html/default/assets/demo/default/custom/components/forms/widgets/select2.js" type="text/javascript"></script>

<script src="assets/relatorioFichas.js" type="text/javascript"></script>
<!--end::Page Resources -->
</body>
<!-- end::Body -->
</html>
