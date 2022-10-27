<div>
    @for($i=0; $i <= $lenght; $i++) <li><a class="dropdown-item" href="/category/<?= $arr[$i] ?>">{{($category[$i]->name)}}</a></li>
        @endfor
</div>