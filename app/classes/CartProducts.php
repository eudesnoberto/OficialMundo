<?php 

namespace app\classes;

use app\interfaces\CartInterface;

class CartProducts
{	

	public function products(CartInterface $cartInterface)
	{
		$producttsInCart = $cartInterface->cart();

		read('produtos');
		$producttsInDataBase = execute();

		$products = [];
		$total = 0;

		foreach ($producttsInCart as $productId => $quantity) {
			$product = [...array_filter($producttsInDataBase, fn ($product) => (int)$product->id === $productId
			)];

			//$product = $producttsInDataBase[$productId];
			$products[] = [
				'id' => $productId,
				'product' => $product[0]->nome_linha_pro,
				'price' => $product[0]->valor_linha_pro,
				'img' => $product[0]->img_lado_linhaPro,
				'qtd' => $quantity,
				'subtotal' => $quantity * $product[0]->valor_linha_pro

			];

			$total += $quantity * $product[0]->valor_linha_pro;
		}

		return[
			'products' => $products,
			'total' => $total

		];
	}
}
