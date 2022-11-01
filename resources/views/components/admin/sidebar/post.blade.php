<div>
    @for($i=0; $i <= $lenght; $i++) <li><a class="nav-link" href="/admin/post/<?= $arr[$i] ?>">{{($category[$i]->name)}}</a></li>
        @endfor
</div>