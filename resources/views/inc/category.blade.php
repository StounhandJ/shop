<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Категории</h2>
        <div class="panel-group category-products" id="accordian">
            <!--category-productsr-->
            @foreach ($categories as $item)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="{{ $item->getId() == $current_category->getId() ? 'active' : '' }}"
                                {{-- data-toggle="collapse"  --}}
                                data-parent="#accordian"
                                href="{{ route('catalog.index', ['department' => $current_department->getEName(), 'category' => $item->getEName()]) }}">
                                {{-- <span class="badge pull-right"><i class="fa fa-plus"></i></span> --}}
                                {{ $item->getName() }}
                            </a>
                        </h4>
                    </div>
                </div>
            @endforeach
        </div>
        <!--/category-products-->

        {{-- <div class="brands_products">
            <!--brands_products-->
            <h2>Brands</h2>
            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
                    <li><a href="#"> <span class="pull-right">(56 &#8381;)</span>Grüne Erde</a></li>
                    <li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
                    <li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
                    <li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
                    <li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
                    <li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                </ul>
            </div>
        </div>
        <!--/brands_products--> --}}
    </div>
</div>
