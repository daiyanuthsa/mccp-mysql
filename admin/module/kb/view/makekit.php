<div class="app-navbar d-flex p-2 border-bottom">

  <div class="btn-group btn-group-sm ms-2">
    <button class="bt-open-kit btn btn-primary"><i class="bi bi-folder2-open"></i> Open Kit</button>
    <button class="bt-close-kit btn btn-primary"><i class="bi bi-x-lg"></i> Close Kit</button>
  </div>
  <div class="btn-group btn-group-sm ms-2">
    <button class="bt-option btn btn-warning text-dark"><i class="bi bi-sliders"></i> Options</button>
    <button class="bt-content btn btn-warning text-dark"><i class="bi bi-file-text"></i> Content</button>
  </div>
  <div class="btn-group btn-group-sm ms-2">
    <button class="bt-toggle-left btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Toggle outgoing edges"><i class="bi bi-box-arrow-up-right"></i></button>
    <button class="bt-toggle-right btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Toggle incoming edges"><i class="bi bi-box-arrow-in-up-right"></i></button>
    <button class="bt-remove btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Remove all edges<br>(full decompose)"><i class="bi bi-x-square"></i></button>
    <button class="bt-restore btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Restore all edges"><i class="bi bi-check2-square"></i></button>
    <button class="bt-reset btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Reset to goalmap settings"><i class="bi bi-arrow-repeat"></i> <?php echo Lang::l('reset'); ?></button>
  </div>
  <div class="btn-group btn-group-sm ms-2">
    <button class="bt-save btn btn-primary"><i class="bi bi-save"></i> <?php echo Lang::l('save'); ?></button>
    <button class="bt-save-as btn btn-primary"><i class="bi bi-front"></i> <?php echo Lang::l('save-as'); ?></button>
    <!-- <button class="bt-export btn btn-primary"><i class="bi bi-send"></i> Export</button> -->
  </div>

</div>
<div class="d-flex flex-fill align-items-stretch">
  <div class="kb-container d-flex flex-fill flex-column border bg-white rounded">
    <div class="kb-toolbar p-1 d-flex align-items-center justify-content-between bg-light border-bottom">
      <span class="left-stack"></span>
      <span class="center-stack"><span class="btn btn-sm">&nbsp;</span></span>
      <span class="right-stack"></span>
    </div>
    <div id="makekit-canvas" class="kb-cy flex-fill"></div>
  </div>
</div>





<form id="kit-save-as-dialog" class="card d-none">
  <h6 class="card-header"><i class="bi bi-file-earmark-plus dialog-icon"></i> 
    <span class="dialog-title">Save Kit
      As...</span></h6>
  <div class="card-body">
    <div class="row mb-1 align-items-center">
      <label for="input-title" class="col-sm-3 col-form-label">Title</label>
      <div class="col-sm-9">
        <input type="text" name="title" class="form-control form-control-sm input-title" id="input-title">
      </div>
    </div>
    <div class="row mb-1 align-items-center">
      <label for="input-fid" class="col-sm-3 col-form-label">Kit ID</label>
      <div class="col-sm-9">
        <div class="input-group">
          <input type="text" class="form-control input-fid form-control-sm" name="fid" id="input-fid" style="text-transform: lowercase;">
          <button class="bt-generate-fid btn btn-warning btn-sm"><i class="bi bi-magic"></i></button>
        </div>
      </div>
    </div>
  </div>
  <div class="card-footer">
    <div class="row">
      <div class="col text-end">
        <button class="bt-cancel btn btn-sm btn-secondary" style="min-width: 6rem;"><?php echo Lang::l('cancel'); ?></button>
        <button class="bt-save btn btn-sm btn-primary ms-1" style="min-width: 6rem;"><?php echo Lang::l('save'); ?></button>
      </div>
    </div>
  </div>
</form>



<form id="concept-map-open-dialog" class="card d-none">
  <h6 class="card-header"><i class="bi bi-folder2-open"></i> Open/Create Kit of a Concept Map</h6>
  <div class="card-body">
    <!-- <ul class="nav nav-pills" id="open-concept-map-tab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link px-2 py-1 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#database" type="button" role="tab" aria-controls="home" aria-selected="true"><small>Database</small></button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link px-2 py-1" id="profile-tab" data-bs-toggle="tab" data-bs-target="#decode" type="button" role="tab" aria-controls="profile" aria-selected="false"><small>Decode</small></button>
      </li>
    </ul> -->
    <!-- <hr class="my-2"> -->
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="database" role="tabpanel" aria-labelledby="database-tab">
        <div class="input-group mb-3" id="form-search-concept-map">
          <input type="text" class="form-control" name="keyword" placeholder="Keyword" aria-label="Search keyword" aria-describedby="button-search-cmap">
          <button class="btn btn-outline-secondary" type="button" id="button-search-cmap"><i class="bi bi-search"></i></button>
        </div>
        <div class="row gx-2 mb-1">
          <!-- <div class="col d-flex text-center text-primary">
            <span class="border-bottom px-2 py-1 flex-fill position-relative">Topic</span></div> -->
          <div class="col d-flex text-center text-primary">
            <span class="border-bottom px-2 py-1 flex-fill position-relative">Concept Map</span>
          </div>
          <div class="col d-flex text-center text-primary">
            <span class="border-bottom px-2 py-1 flex-fill position-relative">Kit</span>
          </div>
        </div>
        <div class="row gx-2 mb-3">
          <!-- <div class="col list list-topic">
            <span class="topic list-item default" data-tid="">
              <em>Unassigned</em><bi class="bi bi-check-lg text-primary"></bi>
            </span>
          </div> -->
          <div class="col list-concept-map scroll-y" style="height:150px;"></div>
          <div class="col list-kit scroll-y" style="height:150px;"></div>
        </div>
        <div class="badge rounded-pill bg-success bt-refresh-cmap-list px-3" role="button">Refresh Concept Map List
        </div>
      </div>
      <div class="tab-pane fade" id="decode" role="tabpanel" aria-labelledby="decode-tab">
        <div class="mb-3">
          <label for="decode-textarea" class="form-label">Concept Map Data</label>
          <textarea class="form-control" id="decode-textarea" rows="4"></textarea>
        </div>
      </div>
    </div>
  </div>
  <div class="card-footer">
    <div class="row">
      <div class="col text-end">
        <button class="bt-cancel btn btn-sm btn-secondary" style="min-width: 6rem;"><?php echo Lang::l('cancel'); ?></button>
        <button class="bt-new btn btn-sm btn-success ms-1" style="min-width: 6rem;">
          <i class="bi bi-asterisk"></i> Create New</button>
        <button class="bt-open btn btn-sm btn-primary ms-1" style="min-width: 6rem;">
          <i class="bi bi-folder2-open"></i> <?php echo Lang::l('open'); ?></button>
      </div>
    </div>
  </div>
</form>

<div id="kit-export-dialog" class="card d-none">
  <h6 class="card-header"><i class="bi bi-send"></i> Export</h6>
  <div class="card-body">
    <textarea class="form-control encoded-data" rows="5"></textarea>
  </div>
  <div class="card-footer text-end">
    <button class="btn btn-sm btn-secondary bt-cancel px-3"><?php echo Lang::l('cancel'); ?></button>
    <button class="btn btn-sm btn-primary ms-1 bt-clipboard px-3"><i class="bi bi-clipboard"></i> Copy to
      Clipboard</button>
  </div>
</div>

<div id="kit-option-dialog" class="card d-none" style="width:600px;">
  <h6 class="card-header"><i class="dialog-icon bi bi-sliders"></i> <span class="dialog-title">Options</span></h6>
  <div class="card-body px-4">
    <div class="row mb-3">
      <div class="col text-primary">
        Options for Kit-Building activity of using this Kit
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="col-sm-12 pb-2 border-bottom mb-2">
          <div class="form-label form-check-inline">Layout</div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="layout" value="preset" id="input-layout-preset" checked>
            <label class="form-check-label" for="input-layout-preset">
              Preset
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="layout" value="random" id="input-layout-random">
            <label class="form-check-label" for="input-layout-random">
              Random
            </label>
          </div>
        </div>
        <div class="col-sm-12">
          <label class="form-label">Feedback given during recomposition.</label>
        </div>
        <div class="col-sm-10 mb-3">
          <select class="form-select form-select-sm" name="feedbacklevel">
            <option value="0">Level 0 - No Feedback</option>
            <option value="1">Level 1 - Count Only</option>
            <option class="default" value="2">Level 2 - Count and Edge Visual</option>
            <option value="3">Level 3 - Count, Edge Visual, and Expected Edge</option>
          </select>
        </div>

        <div class="col-sm-12 mb-2">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="modification" id="input-modification">
            <label class="form-check-label" for="input-modification">Allow modification of concept map after
              submit.</label>
          </div>
        </div>
        <div class="col-sm-12 mb-2">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="readcontent" id="input-readcontent">
            <label class="form-check-label" for="input-readcontent">Allow read topic/kit content.</label>
          </div>
        </div>
        <div class="col-sm-12 mb-2">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="saveload" id="input-saveload">
            <label class="form-check-label" for="input-saveload">Allow save and load recomposed concept map.</label>
          </div>
        </div>
        <div class="col-sm-12 mb-2">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="reset" id="input-reset">
            <label class="form-check-label" for="input-reset">Allow reset concept map to initial kit.</label>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="col-sm-12 mb-2">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="fullfeedback" id="input-fullfeedback">
            <label class="form-check-label" for="input-fullfeedback">Provide full feedback after submit.</label>
          </div>
        </div>
        <div class="col-sm-12 mb-2">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="feedbacksave" id="input-feedbacksave">
            <label class="form-check-label" for="input-feedbacksave">Capture concept map state when feedback is
              requested.</label>
          </div>
        </div>
        <div class="col-sm-12 mb-2">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="countfb" id="input-countfb">
            <label class="form-check-label" for="input-countfb">Show the number of feedback given.</label>
          </div>
        </div>
        <div class="col-sm-12 mb-2">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="countsubmit" id="input-countsubmit">
            <label class="form-check-label" for="input-countsubmit">Show the number of submission performed.</label>
          </div>
        </div>
        <div class="col-sm-12 mb-2">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="log" id="input-log">
            <label class="form-check-label" for="input-log">Log concept mapping activity of this kit for
              analysis.</label>
          </div>
        </div>
      </div>
      <div class="col-sm-12 mt-2">
        <span class="bt-enable-all badge bg-primary rounded-pill px-4" role="button">Enable All</span>
        <span class="bt-disable-all badge bg-secondary rounded-pill px-4 ms-1" role="button">Disable All</span>
        <span class="bt-default badge bg-success rounded-pill px-4 ms-1" role="button">Default Settings</button>
      </div>
    </div>
  </div>
  <div class="card-footer text-end">
    <button class="btn btn-sm btn-secondary bt-cancel px-3"><?php echo Lang::l('close'); ?></button>
    <button class="btn btn-sm btn-primary ms-1 bt-apply px-3"><i class="dialog-icon bi bi-check-lg"></i> Apply</button>
  </div>
</div>

<div id="text-dialog" class="card d-none">
  <h6 class="card-header d-flex">
    <span class="drag-handle flex-fill"><i class="dialog-icon bi bi-file-text-fill me-2"></i> <span class="dialog-title">Assign Text</span></span>
    <i class="bi bi-x-lg bt-close bt-x" role="button"></i>
  </h6>
  <div class="card-body">
    <div id="kit-name" class="text-primary py-2"></div>
    <div id="assigned-text"></div>
    <hr class="my-3">
    <form class="row form-search-text g-3 needs-validation" novalidate>
      <div class="col">
        <div class="input-group input-group-sm">
          <input type="text" class="form-control" id="input-keyword" placeholder="Keyword">
          <button class="btn btn-primary"><i class="bi bi-search"></i></button>
        </div>
        <div id="list-text" class="mt-2"></div>
      </div>
    </form>
  </div>
  <div class="card-footer text-end">
    <button class="btn btn-sm btn-secondary bt-close px-4"><?php echo Lang::l('close'); ?></button>
  </div>
</div>

<div id="kit-content-dialog" class="card d-none">
  <h6 class="card-header d-flex">
    <span class="drag-handle flex-fill"><i class="dialog-icon bi bi-file-text"></i> <span class="dialog-title">Content</span></span>
    <i class="bi bi-x-lg bt-close bt-x" role="button"></i>
  </h6>
  <div class="card-body position-relative overflow-hidden overflow-scroll d-flex flex-fill mb-3">
    <div class="content text-secondary"></div>
  </div>
  <div class="card-footer d-flex justify-content-between align-items-center">
    <span>
      <span class="bt-scroll-top btn btn-sm ms-1 btn-primary px-3"><i class="bi bi-chevron-bar-up"></i> Back to
        Top</span>
      <span class="bt-scroll-more btn btn-sm ms-1 btn-primary px-3"><i class="bi bi-chevron-down"></i> More</span>
    </span>
    <span>
      <button class="btn btn-sm btn-secondary bt-close px-3"><?php echo Lang::l('close'); ?></button>
      <button class="btn btn-sm resize-handle pe-0 ps-3"><i class="bi bi-textarea-resize"></i></button>
    </span>
  </div>
</div>

<div id="bug-dialog" class="align-items-center" style="display: none;">
  <div class="card">
    <div class="card-body">
      <span class="mt-2 mb-1 d-block"><small>Correct Label</small></span>
      <input type="text" class="form-control form-control-sm mb-1 input-correct-label" placeholder="Correct Label" aria-label="New Topic Name" aria-describedby="button-create-new-topic">
      <span class="mt-2 mb-1 d-block"><small>Bug Label</small></span>
      <input type="text" class="form-control form-control-sm mb-1 input-bug-label" placeholder="Bug Label" aria-label="New Topic Name" aria-describedby="button-create-new-topic">
      <small>Separate bug labels with comma as the options for students to choose.</small>
      <hr>
      <div class="d-flex justify-content-end">
        <button class="btn btn-sm btn-danger bt-remove-bug" type="button"><i class="bi bi-x-lg"></i> Remove Bug</button>
        <button class="btn btn-sm btn-primary bt-set-bug ms-1" type="button"><i class="bi bi-bug"></i> Set Bug</button>
      </div>
    </div>
  </div>
</div>