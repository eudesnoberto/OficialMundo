<?php $this->layout('master', ['title' => $title]);

use app\classes\Cart;
use app\classes\CartProducts;

$cartProducts = new CartProducts();
$products =$cartProducts->products(new Cart);

?>

<!--
                       <tbody>
                           <tr>
                                                   <td class="col-sm-1 col-md-1" style="text-align: center">
                            <input type="text" class="form-control"  id="qtde" value="<?php //echo $quantidade; ?>" size="2" maxlength="1" data-id="<?php //echo $produtoCarrinho->id; ?>" data-valor_linha_pro="<?php //echo $produtoCarrinho->valor_linha_pro; ?>" onkeypress='return SomenteNumero(event)'/>

                        </td>
                    </tr>
                       </tbody>
                    -->


                    <div class="page-wrapper">


                      <main class="main">

                       <nav aria-label="breadcrumb" class="breadcrumb-nav">
                          <div class="container">
                           <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Seu Pedido</li>
                         </ol>
                      </div><!-- End .container -->
                   </nav><!-- End .breadcrumb-nav -->

                   <div class="page-content">
                      <div class="cart">
                       <div class="container">
                          <div class="row">
                             <div class="col-lg-9">
                              <?php if(count($products['products']) >= 1): ?>
                                <table class="table table-cart table-mobile">

                                 <thead>
                                   <tr>

                                     <th>Produto</th>
                                     <th>Preço</th>
                                     <th>Quantidade</th>
                                     <th>Total</th>
                                     <th></th>
                                  </tr>
                               </thead>

                               <tbody>

                                 <?php foreach ($products['products'] as $product): ?>

                                  <tr>
                                     <td class="product-col">
                                        <div class="product">
                                           <figure class="product-media">
                                              <a href="#">
                                                 <img src="../assets/molla/images/carrinho/<?php echo $product['img']; ?>" alt="Product image">
                                              </a>
                                           </figure>


                                           <h3 class="product-title">
                                             <a href="/produtos/<?php echo $product['product']; ?>"><?php echo $product['product']; ?></a>
                                          </h3><!-- End .product-title -->
                                       </div><!-- End .product -->
                                    </td>
                                    <td class="price-col">R$ <?php echo number_format($product['price'], 2, ',', '.'); ?></td>
                                    <td class="quantity-col">
                                      <div class="cart-product-quantity">
                                       <form action="/update" method="get">
                                       <input type="number" name="qtd" id="cart-input-qtd" class="form-control" value="<?php echo $product['qtd']; ?>" min="1" max="10" step="1" data-decimals="0" required>
                                       <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                                    </form>

                                    </div><!-- End .cart-product-quantity -->
                                 </td>
                                 <td class="total-col">R$ <?php echo number_format($product['subtotal'], 2, ',', '.'); ?></td>
                                 <td class="remove-col"><a href="/remove/<?php echo $product['id'] ?>" class="btn-remove"><i class="icon-close"></i></a></td>
                              </tr>
                           <?php endforeach; ?>




                        </tbody>
                     </table><!-- End .table table-wishlist -->


                  <div class="cart-bottom">
                     <div class="cart-discount">
                        <form action="#">
                           <div class="input-group">
                             <input type="text" class="form-control" required placeholder="coupon code">
                             <div class="input-group-append">
                              <button class="btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button>
                           </div><!-- .End .input-group-append -->
                        </div><!-- End .input-group -->
                     </form>
                  </div><!-- End .cart-discount -->

                  <button class="btn btn-outline-dark-2"><span>Atualizar</span><i class="icon-refresh"></i></button>
                  <a href="/removeAll" class="btn btn-outline-dark-2"><span>Limpar Pedidos</span><i class="icon-trash"></i></a>
               </div><!-- End .cart-bottom -->
            </div><!-- End .col-lg-9 -->
            <aside class="col-lg-3">
             <div class="summary summary-cart">
                <h3 class="summary-title">Pedido Total</h3><!-- End .summary-title -->

                <table class="table table-summary">
                   <tbody>
                      <tr class="summary-subtotal">
                         <td>Subtotal:</td>
                         <td>R$ <?php echo number_format($products['total'], 2, ',', '.'); ?></td>
                      </tr><!-- End .summary-subtotal -->
                      <tr class="summary-shipping">
                         <td>Transporte:</td>
                         <td>&nbsp;</td>
                      </tr>

                      <tr class="summary-shipping-row">
                         <td>
                            <div class="custom-control custom-radio">
                               <input type="radio" id="free-shipping" name="shipping" class="custom-control-input">
                               <label class="custom-control-label" for="free-shipping">Frete Grátis</label>
                            </div><!-- End .custom-control -->
                         </td>
                         <td>R$ 0.00</td>
                      </tr><!-- End .summary-shipping-row -->

                      <tr class="summary-shipping-row">
                        <td>
                           <div class="custom-control custom-radio">
                              <input type="radio" id="standart-shipping" name="shipping" class="custom-control-input">
                              <label class="custom-control-label" for="standart-shipping">Pac</label>
                           </div><!-- End .custom-control -->
                        </td>
                        <td>R$ 96.37</td>
                     </tr><!-- End .summary-shipping-row -->

                     <tr class="summary-shipping-row">
                       <td>
                          <div class="custom-control custom-radio">
                             <input type="radio" id="express-shipping" name="shipping" class="custom-control-input">
                             <label class="custom-control-label" for="express-shipping">Sedex:</label>
                          </div><!-- End .custom-control -->
                       </td>
                       <td>R$ 130.00</td>
                    </tr><!-- End .summary-shipping-row -->


                    <tr class="summary-total">
                      <td>Total:</td>
                      <td>$3652.00</td>
                   </tr><!-- End .summary-total -->
                </tbody>
             </table><!-- End .table table-summary -->

             <a href="/pay" class="btn btn-outline-primary-2 btn-order btn-block">Fechar Pedido</a>
          </div><!-- End .summary -->
                  <?php else: ?>

                     <span class="btn btn-outline-dark-2 btn-block mb-3">Carrinho Vazio</span>

                  <?php endif; ?>
          <a href="/" class="btn btn-outline-dark-2 btn-block mb-3"><span>Continuar Comprando</span><i class="icon-shopping-cart"></i></a>
       </aside><!-- End .col-lg-3 -->
    </div><!-- End .row -->
 </div><!-- End .container -->
</div><!-- End .cart -->
</div><!-- End .page-content -->
</main><!-- End .main -->