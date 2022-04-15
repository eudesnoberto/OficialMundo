<?php $this->layout('master', ['title' => $title]) ?>

<?php $myProduct = $produto; ?>
<?php foreach ($myProduct as $produto): ?>
   <div class="page-wrapper">
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
            <div class="container d-flex align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Produtos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">


                        <?php if($produto->natural_gelado == 1): $estado = "Água Natural"; ?> 
                            Água Natural 

                            <?php elseif($produto->natural_gelado == 2): $estado = "Água Gelada"; ?> 
                                Água Gelada 

                                <?php else: echo $produto->nome_linha_pro; endif; ?> </li>
                            </ol>

                            <nav class="product-pager ml-auto" aria-label="Product">
                                <a class="product-pager-link product-pager-prev" href="#" aria-label="Previous" tabindex="-1">
                                    <i class="icon-angle-left"></i>
                                    <span>Voltar</span>
                                </a>

                                <a class="product-pager-link product-pager-next" href="#" aria-label="Next" tabindex="-1">
                                    <span>Avançar</span>
                                    <i class="icon-angle-right"></i>
                                </a>
                            </nav><!-- End .pager-nav -->
                        </div><!-- End .container -->
                    </nav><!-- End .breadcrumb-nav -->

                    <div class="page-content">
                        <div class="container">
                            <div class="product-details-top">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="product-gallery product-gallery-vertical">
                                            <div class="row">
                                                <figure class="product-main-image">
                                                    <img id="product-zoom" src="../assets/molla/images/home/todos/<?php echo $produto->img_lado_linhaPro; ?>" data-zoom-image="../assets/molla/images/home/todos/<?php echo $produto->img_lado_linhaPro; ?>" alt="product image">

                                                    <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                        <i class="icon-arrows"></i>
                                                    </a>
                                                </figure><!-- End .product-main-image -->

                                                <?php if (!$produto->img_lado_linhaPro2): else: ?>


                                                   <div id="product-zoom-gallery" class="product-image-gallery">
                                                    <a class="product-gallery-item active" href="#" data-image="../assets/molla/images/home/todos/<?php echo $produto->img_lado_linhaPro; ?>" data-zoom-image="../assets/molla/images/home/todos/<?php echo $produto->img_lado_linhaPro; ?>">
                                                        <img src="../assets/molla/images/home/todos/<?php echo $produto->img_lado_linhaPro; ?>" alt="product side">
                                                    </a>
                                                    <a class="product-gallery-item" href="#" data-image="../assets/molla/images/home/todos/<?php echo $produto->img_lado_linhaPro2; ?>"data-zoom-image="../assets/molla/images/home/todos/<?php echo $produto->img_lado_linhaPro2; ?>">
                                                        <img src="../assets/molla/images/home/todos/<?php echo $produto->img_lado_linhaPro2; ?>" alt="product cross">
                                                    </a>

                                                    <a class="product-gallery-item" href="#" data-image="../assets/molla/images/home/todos/<?php echo $produto->img_lado_linhaPro3; ?>" data-zoom-image="../assets/molla/images/home/todos/<?php echo $produto->img_lado_linhaPro3; ?>">
                                                        <img src="../assets/molla/images/home/todos/<?php echo $produto->img_lado_linhaPro3; ?>" alt="product with model">
                                                    </a>

                                                </div><!-- End .product-image-gallery -->
                                            <?php endif; ?>

                                        </div><!-- End .row -->
                                    </div><!-- End .product-gallery -->
                                </div><!-- End .col-md-6 -->

                                <div class="col-md-6">
                                    <div class="product-details">
                                        <h1 class="product-title"><?php echo $produto->nome_linha_pro; ?></h1><!-- End .product-title -->

                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews )</a>
                                        </div><!-- End .rating-container -->

                                        <div class="product-price">
                                            R$ <?php echo $produto->valor_linha_pro; ?>
                                        </div><!-- End .product-price -->

                                        <div class="product-content">
                                            <?php
                                            $texto = $produto->descricao_prev_linhaPro;
                                            echo $breveDescricao = substr($texto, 0,300);
                                        ?>...
                                    </div><!-- End .product-content -->

                                    <div class="details-filter-row details-row-size">
                                        <label for="size">COR: </label>
                                        <div class="select-custom">
                                            <select name="size" id="size" class="form-control">
                                                <option value="#" selected="selected">Cores Disponiveis</option>
                                                <option value="b">Branco</option>
                                                <option value="p">Preto</option>
                                                <option value="v">Vermelho</option>
                                                <option value="c">Cinza</option>
                                            </select>
                                        </div><!-- End .select-custom -->


                                    </div><!-- End .details-filter-row -->

                                    <div class="details-filter-row details-row-size">
                                        <label for="size">Voltagem: </label>
                                        <div class="select-custom">
                                            <select name="size" id="size" class="form-control">
                                                <option value="#" selected="selected">Escolha a Voltagem</option>
                                                <option value="s">110</option>
                                                <option value="m">220</option>
                                            </select>
                                        </div><!-- End .select-custom -->


                                    </div><!-- End .details-filter-row -->

                                    <div class="details-filter-row details-row-size">
                                        <label for="qty">Qty:</label>
                                        <div class="product-details-quantity">
                                            <input type="number" id="qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                        </div><!-- End .product-details-quantity -->
                                    </div><!-- End .details-filter-row -->

                                    <div class="product-details-action">
                                        <a href="#" class="btn-product btn-cart"><span>Adicionar ao Carrino</span></a>

                                        <div class="details-action-wrapper">
                                            <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Adicionar a Lista de Desejos</span></a>
                                            <a href="#" class="btn-product btn-compare" title="Compare"><span>Adicionar Para Comparar</span></a>
                                        </div><!-- End .details-action-wrapper -->
                                    </div><!-- End .product-details-action -->

                                    <div class="product-details-footer">
                                        <div class="product-cat">
                                            <span>Categoria:</span>
                                            <a href="#"><?php echo $estado; ?></a>
                                            

                                        </div><!-- End .product-cat -->

                                        <div class="social-icons social-icons-sm">
                                            <span class="social-label">Compartilhar:</span>
                                            <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                            <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                            <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                            <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                        </div>
                                    </div><!-- End .product-details-footer -->
                                </div><!-- End .product-details -->
                            </div><!-- End .col-md-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .product-details-top -->

                    <div class="product-details-tab">
                        <ul class="nav nav-pills justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Descrição do Produto</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">Informações Adicionais
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Compras e Retornos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Visitas (2)</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                                    <div class="product-desc-content">
                                        <h3>Informação Sobre o Produto</h3>
                                        <?php echo $produto->descricao_linhaPro; ?> </p>
                                    </div><!-- End .product-desc-content -->
                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                                    <div class="product-desc-content">
                                        <h3>Information</h3>
                                        <?php echo $produto->descricao_prev_linhaPro; ?>
<!--
                                        <h3>Fabric & care</h3>
                                        <ul>
                                            <li>Faux suede fabric</li>
                                            <li>Gold tone metal hoop handles.</li>
                                            <li>RI branding</li>
                                            <li>Snake print trim interior </li>
                                            <li>Adjustable cross body strap</li>
                                            <li> Height: 31cm; Width: 32cm; Depth: 12cm; Handle Drop: 61cm</li>
                                        </ul>

                                        <h3>Size</h3>
                                        <p>one size</p>
                                    -->                                  </div><!-- End .product-desc-content -->
                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">
                                    <div class="product-desc-content">
                                        <h3>Entregas & Retornos</h3>

                                    </div><!-- End .product-desc-content -->
                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                                    <div class="reviews">
                                        <h3>Visitas (2)</h3>
                                        <div class="review">
                                            <div class="row no-gutters">
                                                <div class="col-auto">
                                                    <h4><a href="#">Eudes Alves</a></h4>
                                                    <div class="ratings-container">
                                                        <div class="ratings">
                                                            <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                                        </div><!-- End .ratings -->
                                                    </div><!-- End .rating-container -->
                                                    <span class="review-date">a 6 Dias</span>
                                                </div><!-- End .col -->
                                                <div class="col">
                                                    <h4>Produto Perfeito</h4>

                                                    <div class="review-content">

                                                    </div><!-- End .review-content -->

                                                    <div class="review-action">
                                                        <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>
                                                        <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                                    </div><!-- End .review-action -->
                                                </div><!-- End .col-auto -->
                                            </div><!-- End .row -->
                                        </div><!-- End .review -->

                                        <div class="review">
                                            <div class="row no-gutters">
                                                <div class="col-auto">
                                                    <h4><a href="#">John Doe</a></h4>
                                                    <div class="ratings-container">
                                                        <div class="ratings">
                                                            <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                                        </div><!-- End .ratings -->
                                                    </div><!-- End .rating-container -->
                                                    <span class="review-date">5 days ago</span>
                                                </div><!-- End .col -->
                                                <div class="col">
                                                    <h4>Very good</h4>

                                                    <div class="review-content">
                                                    </p>
                                                </div><!-- End .review-content -->

                                                <div class="review-action">
                                                    <a href="#"><i class="icon-thumbs-up"></i>Helpful (0)</a>
                                                    <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                                </div><!-- End .review-action -->
                                            </div><!-- End .col-auto -->
                                        </div><!-- End .row -->
                                    </div><!-- End .review -->
                                </div><!-- End .reviews -->
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .product-details-tab -->

                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                    data-owl-options='{
                        "nav": false, 
                        "dots": true,
                        "margin": 20,
                        "loop": true,
                        "responsive": {
                            "0": {
                                "items":1
                            },
                            "480": {
                                "items":2
                            },
                            "768": {
                                "items":3
                            },
                            "992": {
                                "items":4
                            },
                            "1200": {
                                "items":4,
                                "nav": true,
                                "dots": false
                            }
                        }
                    }'>

                    <?php
                    $myCategoria = $produto->categoria_linha_pro;
                    read('produtos', '*');
                    where('categoria_linha_pro', $myCategoria);
                    $categorias = execute();

                    foreach ($categorias as $categoria): 

                        if($categoria->natural_gelado == 1): $naturalGelado = "Água Natural";
                            elseif($categoria->natural_gelado == 2): $naturalGelado = "Água Gelada";
                            endif;
                            ?>

                            <div class="product product-7 text-center">

                                <figure class="product-media">
                                    <a href="/produtos/<?php echo $categoria->id; ?>">
                                        <img src="../assets/molla/images/home/todos/<?php echo $categoria->img_lado_linhaPro; ?>" alt="Product image" class="product-image">
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>Lista de Desejos</span></a>
                                        <a href="/produtos/<?php $categoria->id; ?>" class="btn-product-icon btn-quickview" title="Visualizar"><span>Visualizar</span></a>
                                        <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                    </div><!-- End .product-action-vertical -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart"><span>Adicionar ao Carrinho</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#"><?php echo $naturalGelado; ?></a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="/produtos/<?php echo $categoria->id; ?>"><?php echo $categoria->nome_linha_pro; ?></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            R$ <?php echo $categoria->valor_linha_pro; ?>
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 2 Reviews )</span>
                                        </div><!-- End .rating-container -->


                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->

                            <?php endforeach; ?>

                        </div><!-- End .owl-carousel -->
                    </div><!-- End .container -->
                </div><!-- End .page-content -->
            </main><!-- End .main -->

            <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>
        <?php endforeach; ?>
        <!-- Sticky Bar -->
        <div class="sticky-bar">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <figure class="product-media">
                            <a href="product.html">
                                <img src="../assets/molla/images/home/todos/<?php echo $produto->img_lado_linhaPro; ?>" alt="Product image">
                            </a>
                        </figure><!-- End .product-media -->
                        <h4 class="product-title"><a href="/produtos/<?php echo $categoria->id; ?>"><?php echo $produto->nome_linha_pro; ?></a></h4><!-- End .product-title -->
                    </div><!-- End .col-6 -->

                    <div class="col-6 justify-content-end">
                        <div class="product-price">
                            R$ <?php echo $produto->valor_linha_pro; ?>
                        </div><!-- End .product-price -->
                        <div class="product-details-quantity">
                            <input type="number" id="sticky-cart-qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                        </div><!-- End .product-details-quantity -->

                        <div class="product-details-action">
                            <a href="#" class="btn-product btn-cart"><span>Comprar Agora</span></a>
                            <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Adicionar a Lista de Desejos</span></a>
                        </div><!-- End .product-details-action -->
                    </div><!-- End .col-6 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
    </div><!-- End .sticky-bar -->