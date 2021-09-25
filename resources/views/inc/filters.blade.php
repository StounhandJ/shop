<div class="price-range">
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title filter-btn" id="sortByPriceTitle">Сортировать по цене</h4>
                <div id="filters-all-input-wrapper">
                    <div class="filters-all-input">
                        <input type="number" class="filter-input" name="min-price" value="" min="0" step="1000" max="500000" id="min-price" placeholder="От">
                        <input type="number" class="filter-input" name="max-price" value="" min="0" step="1000" max="500000" id="max-price" placeholder="До">
                    </div>
                    <p id="price-required" style="display:none;">заполните поля 0 - 500 000</p>
                    <div class="price-range-btn">
                        <button class="btn btn-primary btn-price-slider" id="filter-price">Применить</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <button id="filter-Az" class="filter-btn">По алфавиту</button>
                </h4>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <button id="filter-popular" class="filter-btn">По популярности</button>
                </h4>
            </div>
        </div>
        <div class="price-range-btn">
            <button class="btn btn-primary btn-price-slider" id="filter-clear">Очистить</button>
        </div>
    </div>
</div>
