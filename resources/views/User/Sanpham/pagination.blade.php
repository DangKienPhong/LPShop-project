{{-- <div class="aa-product-catg-pagination">
    <nav>
      <ul class="pagination">
        <li>
          <a href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li>
          <a href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>
  </div> --}}
  <div class="aa-product-catg-pagination">
    <nav>
      <ul>
        <li>

          {{$listSanPham->links('pagination::bootstrap-4')}}

        </li>
      </ul>
    </nav>
  </div>
