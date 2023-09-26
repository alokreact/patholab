<aside class="col-md-3 search-tpl-sidebar">            
    <div class="card">

      <article class="filter-group">
            <header class="card-header">
                <a href="#" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true" class="">
                  <i class="icon-control fa fa-chevron-down"></i>
                  <h6 class="title">Category</h6>
                </a>
            </header>
        
            <div class="filter-content collapse show" id="collapse_1" style="">
              <div class="card-body">

                @forelse($categories as $category)
                <label class="custom-control custom-checkbox">
                  <input type="checkbox"  class="custom-control-input">
                  <div class="custom-control-label">{{ucfirst($category->category_name)}}  
                </div>
                </label>
                @empty
                <p></p>

              @endforelse
              <button class="btn btn-block btn-primary">Apply</button>
              </div> <!-- card-body.// -->
          </div>
        </article> <!-- filter-group  .// -->
  
   
    <article class="filter-group">
        <header class="card-header">
            <a href="#" data-toggle="collapse" data-target="#collapse_2" aria-expanded="true" class="">
                <i class="icon-control fa fa-chevron-down"></i>
                <h6 class="title">Organs </h6>
            </a>
        </header>

        <div class="filter-content collapse show" id="collapse_2" style="">
            <div class="card-body">
              @forelse($organs as $organ)
                <label class="custom-control custom-checkbox">
                  <input type="checkbox"  class="custom-control-input">
                  <div class="custom-control-label">{{ucfirst($organ->name)}}  
                </div>
                </label>
                @empty
                <p></p>

              @endforelse
              <button class="btn btn-block btn-primary">Apply</button>
            </div> <!-- card-body.// -->
        </div>
    
      </article> <!-- filter-group .// -->
    
    
    {{-- <article class="filter-group">
        <header class="card-header">
            <a href="#" data-toggle="collapse" data-target="#collapse_3" aria-expanded="true" class="">
                <i class="icon-control fa fa-chevron-down"></i>
                <h6 class="title">Price range </h6>
            </a>
        </header>
        
        <div class="filter-content collapse show" id="collapse_3" style="">
            <div class="card-body">
                <input type="range" class="custom-range" min="0" max="100" name="">
                <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Min</label>
                  <input class="form-control" placeholder="$0" type="number">
                </div>
                <div class="form-group text-right col-md-6">
                  <label>Max</label>
                  <input class="form-control" placeholder="$1,0000" type="number">
                </div>
                </div> <!-- form-row.// -->
                <button class="btn btn-block btn-primary">Apply</button>
            </div><!-- card-body.// -->
        </div>
    </article> <!-- filter-group .// --> --}}
    
    {{-- <article class="filter-group">
        <header class="card-header">
            <a href="#" data-toggle="collapse" data-target="#collapse_4" aria-expanded="true" class="">
                <i class="icon-control fa fa-chevron-down"></i>
                <h6 class="title">Sizes </h6>
            </a>
        </header>
        <div class="filter-content collapse show" id="collapse_4" style="">
            <div class="card-body">
              <label class="checkbox-btn">
                <input type="checkbox">
                <span class="btn btn-light"> XS </span>
              </label>

              <label class="checkbox-btn">
                <input type="checkbox">
                <span class="btn btn-light"> SM </span>
              </label>

              <label class="checkbox-btn">
                <input type="checkbox">
                <span class="btn btn-light"> LG </span>
              </label>

              <label class="checkbox-btn">
                <input type="checkbox">
                <span class="btn btn-light"> XXL </span>
              </label>
        </div><!-- card-body.// -->
        </div>
    </article> <!-- filter-group .// --> --}}
   



</div> <!-- card.// -->
</aside>