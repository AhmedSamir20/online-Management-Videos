<div class="row">
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                    <i class="fa fa-youtube"></i>
                </div>
                <p class="card-category">Videos</p>
                <h3 class="card-title">{{\App\Models\Video::count()}}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">

                    <i class="material-icons ">warning</i>
                    <a href="{{route('videos.index')}}" class="warning-link">All videos</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">

                    <i class="fa fa-address-book"></i>
                </div>
                <p class="card-category">Skills</p>
                <h3 class="card-title">{{\App\Models\Skill::count()}}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">date_range</i><a href="{{route('skills.index')}}" class="info-link">All Skills</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                    <i class="fa fa-tag"></i>
                </div>
                <p class="card-category">Tags</p>
                <h3 class="card-title">{{\App\Models\Tag::count()}}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">local_offer</i> <a href="{{route('tags.index')}}" class="primary-link">All Tags</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                    <i class="fa fa-comment"></i>
                </div>
                <p class="card-category">Comments</p>
                <h3 class="card-title">{{\App\Models\Comment::count()}}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">update</i> <a href="{{route('videos.index')}}" class="warning-link">Check Videos</a>
                </div>
            </div>
        </div>
    </div>
</div>
