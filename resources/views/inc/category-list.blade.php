<div class="categories">
@foreach ($categories as $category)


        <ul>
          <li><a href="{{ route('index.blog',['category' => $category->name]) }}">{{ $category->name }}</a></li>

        </ul>


@endforeach
</div>
