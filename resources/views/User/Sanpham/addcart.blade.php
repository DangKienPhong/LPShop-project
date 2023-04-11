
                                  <form action="{{route('addcart',['id'=>$sanpham->id])}}" method="POST">
                                    @csrf
                                    <button class="aa-add-card-btn" type="submit"><span class="fa fa-shopping-cart"></span>Thêm vào giỏ hàng</button >
                                  </form>
