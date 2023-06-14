<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2019-2022
 */

$enc = $this->encoder();

/** client/html/basket/bulk/rows
 * Number or rows shown in the product bulk order form by default
 *
 * The product bulk order form shows a new line for adding a product to the basket
 * by default. You can change the number of empty input lines shown by default
 * using this configuration setting.
 *
 * @param int Number of lines shown
 * @since 2020.07
 */
$rows = (int) $this->config( 'client/html/basket/bulk/rows', 1 );


?>
<section class="aimeos basket-bulk" data-jsonurl="<?= $enc->attr( $this->link( 'client/jsonapi/url' ) ) ?>">
  <div class="container-xxl">

    <div class="d-flex justify-content-between align-items-center">
      <h1 class="fw-bold fs-6">
        <?= $enc->html( $this->translate( 'client', 'Bulk order' ), $enc::TRUST ) ?>
      </h1>
      <div class="buttons responive-add-button">
        <div class="minibutton add"></div>
      </div>
    </div>

    <form method="POST" action="<?= $enc->attr( $this->link( 'client/html/basket/standard/url' ) ) ?>">
      <!-- basket.bulk.csrf -->
      <?= $this->csrf()->formfield() ?>
      <!-- basket.bulk.csrf -->

      <input type="hidden" value="add" name="<?= $enc->attr( $this->formparam( 'b_action' ) ) ?>">

      <div class="bulk-main">
        <table>
          <colgroup class="table-row">
            <col span="1" class="table-col-1">
            <col span="1" class="table-col-2">
            <col span="1" class="table-col-3">
            <col span="1" class="table-col-4">
          </colgroup>
          <thead class="headline">
            <tr>
              <th scope="col">
                <div class="product-item">
                  <?= $enc->html( $this->translate( 'client', 'Article' ) ) ?>
                </div>
              </th>
              <th scope="col">
                <div class="quantity">
                  <?= $enc->html( $this->translate( 'client', 'Quantity' ) ) ?>
                </div>
              </th>
              <th scope="col">
                <div class="price">
                  <?= $enc->html( $this->translate( 'client', 'Price' ) ) ?>
                </div>
              </th>
              <th scope="col">
                <div class="buttons">
                  <div class="minibutton add"></div>
                </div>
              </th>
            </tr>
          </thead>
          <div class="bulk-content">
            <tbody>
              <?php for( $idx = 0; $idx < $rows; $idx++ ) : ?>
              	<tr class="details">
					<td data-label="Article">
						<div class="product-item">
							<input type="hidden" class="attrvarid"
								name="<?= $enc->attr( $this->formparam( ['b_prod', $idx, 'attrvarid', '_type_'] ) ) ?>">
							<input type="hidden" class="productid"
								name="<?= $enc->attr( $this->formparam( ['b_prod', $idx, 'prodid'] ) ) ?>">
							<input type="text" class="value search" tabindex="1"
								placeholder="<?= $enc->attr( $this->translate( 'client', 'SKU or article name' ) ) ?>">
							<div class="vattributes"></div>
						</div>
					</td>
					<td data-label="Quantity">
						<div class="quantity">
							<input type="number" class="value" tabindex="1"
							name="<?= $enc->attr( $this->formparam( ['b_prod', $idx, 'quantity'] ) ) ?>" min="1"
							max="2147483647" step="1" required="required" value="1">
						</div>
					</td>
					<td data-label="Price">
						<div class="price"></div>
					</td>
					<td data-label="">
						<div class="buttons">
							<div class="minibutton delete" tabindex="1"></div>
						</div>
					</td>
              	</tr>
              <?php endfor ?>
              <tr class="details prototype">
                <td data-label="Article">
                  <div class="product-item">
                    <input type="hidden" class="attrvarid" disabled="disabled"
                      name="<?= $enc->attr( $this->formparam( ['b_prod', '_idx_', 'attrvarid', '_type_'] ) ) ?>">
                    <input type="hidden" class="productid" disabled="disabled"
                      name="<?= $enc->attr( $this->formparam( ['b_prod', '_idx_', 'prodid'] ) ) ?>">
                    <input type="text" class="value search" tabindex="1" disabled="disabled"
                      placeholder="<?= $enc->attr( $this->translate( 'client', 'SKU or article name' ) ) ?>">
                    <div class="vattributes"></div>
                  </div>
                </td>
                <td data-label="Quantity">
                  <div class="quantity">
                    <input type="number" class="value" tabindex="1" disabled="disabled"
                      name="<?= $enc->attr( $this->formparam( ['b_prod', '_idx_', 'quantity'] ) ) ?>" min="1"
                      max="2147483647" step="1" required="required" value="1">
                  </div>
                </td>
                <td data-label="Price">
                  <div class="price"></div>
                </td>
                <td data-label="">
                  <div class="buttons">
                    <div class="minibutton delete"></div>
                  </div>
                </td>
              </tr>
            </tbody>
        </table>
      </div>
      <div>



        <div class="button-group">
          <button class="btn btn-primary  btn-action" type="submit" value="" tabindex="1">
            <?= $enc->html( $this->translate( 'client', 'Add to basket' ), $enc::TRUST ) ?>
          </button>
        </div>

    </form>
  </div>
</section>

<style>
  .basket-bulk .bulk-content .details {
    border: none;
  }
  .basket-bulk .headline{
    border-bottom:none!important;
	}
  table tbody tr .product-item .value,
  table tbody tr .quantity .value {
    padding: 8px;
    font-size: 10px;
    border: 1px solid var(--ai-my-border-color);
    border-radius: var(--ai-my-border-radius);
  }

  table tbody tr .product-item,
  table thead tr .product-item {
    text-align: start;
  }

  .responive-add-button {
    display: none;
  }

  @media screen and (max-width: 768px) {
    table tbody tr .product-item {
      text-align: end;
    }

    .responive-add-button {
      display: block;
    }
  }
</style>