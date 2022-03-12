<div style="background: whitesmoke">
    <div style="background-color: white;margin: 0 auto;padding: 20px;width: 600px;color: rgb(53, 51, 51);">
      <div  style="text-align: center; align-items: center; justify-content: center">
        <div style="font-size: xx-large;font-weight: bold;margin-bottom: 20px;">Meow Meow! Order confirmation</div>
        <div style="font-size: x-large;font-weight: bold;">Order #23</div>
        <div style="margin-bottom: 10px">19 Au 2019</div>
        <div>Thanks for your choices</div>
        <div>
          This email is to confirm your order. We will send you another email as
          soon as it ships.
        </div>
      </div>

      <div style="margin: 10px 0;">

        <table style="width:100%; text-align:center">
            <tr>
              <th>Name</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Subtotal</th>
            </tr>
            <tr>
              <td>Emil</td>
              <td>12</td>
              <td>12</td>
              <td>234</td>
            </tr>
            <tr>
              <td>Emil</td>
              <td>12</td>
              <td>12</td>
              <td>234</td>
            </tr>
          
          </table>

        {{-- @foreach ($items as $item)
            <div class="item" style="display: flex;width: 100%;align-items: center;justify-content: center;">
                <div class="item__name" style="display: flex;align-items: center;justify-content: center;flex: 0.5;">{{$item['name']}}</div>
                <div class="item__quantity" style="display: flex;align-items: center;justify-content: center;flex: 0.25;">{{$item['quantity']}}</div>
                <div class="item__price" style="display: flex;align-items: center;justify-content: center;">{{$item['finalPrice']}}</div>
                <div class="item__subtotal" style="display: flex;align-items: center;justify-content: center;flex: 0.25;">{{$item['finalPrice'] * $item['quantity']}}</div>
            </div>
            <hr>
        @endforeach --}}
      </div>

      <div class="total__information" style="text-align: end ;margin-right: 50px;">
        <div class="total__attribute">Subtotal:<span style="font-weight: bold;"> ${{$cart->total_price}} </span></div>
        <div class="total__attribute">Shipping:<span style="font-weight: bold;"> ${{$cart->shipping_price}} </span></div>
        <div class="total__attribute">Total:<span style="font-weight: bold;"> ${{$cart->totalAndShipping()}} </span></div>
      </div>
    </div>
  </div>

