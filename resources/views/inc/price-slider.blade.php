<div class="price-slider-wrapper">
    <div class="filters-all-input">
        <input type="number" class="filter-input" name="min-price" value="" min="0" step="1000"
            max="500000" id="min-price" placeholder="От">
        <input type="number" class="filter-input" name="max-price" value="" min="0" step="1000"
            max="500000" id="max-price" placeholder="До">
    </div>
    @include('inc.price-range-btn')
</div>  
<p id="price-required" style="display:none;">некорректные значения</p>
