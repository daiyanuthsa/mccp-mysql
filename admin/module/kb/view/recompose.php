<div class="app-navbar d-flex p-2 border-bottom">  
  
  <button class="bt-open-kit btn btn-sm btn-primary"><i class="bi bi-folder2-open"></i> Open Kit</button>
  
  <div class="btn-group btn-group-sm ms-2" id="recompose-readcontent">
    <button class="bt-content btn btn-sm btn-secondary"><i class="bi bi-file-text-fill"></i> Contents</button>
  </div>

  <div class="btn-group btn-group-sm ms-2" id="recompose-saveload">
    <button class="bt-save btn btn-secondary"><i class="bi bi-download"></i> <?php echo Lang::l('save'); ?></button>
    <button class="bt-load btn btn-secondary"><i class="bi bi-upload"></i> <?php echo Lang::l('load'); ?></button>
  </div>

  <div class="btn-group btn-group-sm ms-2" id="recompose-reset">
    <button class="bt-reset btn btn-danger"><i class="bi bi-arrow-counterclockwise"></i> <?php echo Lang::l('reset'); ?></button>
  </div>

  <div class="btn-group btn-group-sm ms-2" id="recompose-feedbacklevel">
    <button class="bt-feedback btn btn-warning"><i class="bi bi-eye-fill"></i> Feedback</button>
    <button class="bt-clear-feedback btn btn-warning"><i class="bi bi-eye-slash-fill"></i> Clear Feedback</button>
  </div>

  <div class="btn-group btn-group-sm ms-2">
    <button class="bt-submit btn btn-danger"><i class="bi bi-send"></i> Submit</button>
  </div>

</div>
<div class="d-flex flex-fill align-items-stretch p-2">
  <?php $this->pluginView('kitbuild-ui', ["id" => "recompose-canvas"], 0); ?>
</div>








<form id="concept-map-open-dialog" class="card d-none">
  <h6 class="card-header"><i class="bi bi-folder2-open"></i> Open/Create Kit of a Concept Map</h6>
  <div class="card-body">
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="database" role="tabpanel" aria-labelledby="database-tab">
        <div class="row gx-2 mb-1">
          <div class="col d-flex text-center text-primary">
            <span class="border-bottom px-2 py-1 flex-fill position-relative">Topic</span></div>
          <div class="col d-flex text-center text-primary">
            <span class="border-bottom px-2 py-1 flex-fill position-relative">Concept Map</span></div>
          <div class="col d-flex text-center text-primary">
            <span class="border-bottom px-2 py-1 flex-fill position-relative">Kit</span></div>
        </div>
        <div class="row gx-2 mb-3">
          <div class="col list list-topic">
            <span class="topic list-item default" data-tid="">
              <em>Unassigned</em><bi class="bi bi-check-lg text-primary"></bi>
            </span>
          </div>
          <div class="col list list-concept-map"></div>
          <div class="col list list-kit"></div>
        </div>
        <div class="badge rounded-pill bg-secondary bt-refresh-topic-list px-3" role="button">Refresh Topic List</div>
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
    <button class="btn btn-sm btn-primary ms-1 bt-clipboard px-3"><i class="bi bi-clipboard"></i> Copy to Clipboard</button>
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
      <span class="bt-scroll-top btn btn-sm ms-1 btn-primary px-3"><i class="bi bi-chevron-bar-up"></i> Back to Top</span>
      <span class="bt-scroll-more btn btn-sm ms-1 btn-primary px-3"><i class="bi bi-chevron-down"></i> More</span>
    </span>
    <span>
      <button class="btn btn-sm btn-secondary bt-close px-3"><?php echo Lang::l('close'); ?></button>
      <button class="btn btn-sm resize-handle pe-0 ps-3"><i class="bi bi-textarea-resize"></i></button>
    </span>
  </div>
</div>


<div id="feedback-dialog" class="card d-none">
  <h6 class="card-header d-flex">
    <span class="drag-handle flex-fill"><i class="dialog-icon bi bi-eye-fill me-2"></i> <span class="dialog-title">Quick Feedback</span></span>
    <i class="bi bi-x-lg bt-close bt-x" role="button"></i>
  </h6>
  <div class="card-body">
    <div class="feedback-content"></div>
  </div>
  <div class="card-footer text-end">
    <button class="btn btn-sm btn-secondary bt-cancel bt-close px-3"><?php echo Lang::l('ok'); ?></button>
    <button class="btn btn-sm btn-primary bt-modify px-3 ms-1">Modify My Map</button>
  </div>
</div>

<div id="feedback-mode-dialog" class="card d-none">
  <div class="card-body text-center">
    <div class="feedback-content text-center d-flex align-items-center justify-content-center">
      <i class="bi bi-exclamation-triangle fs-3 text-danger mx-3"></i> You are in Feedback mode.
    </div>
    <button class="btn bt-modify btn-warning btn-sm mt-2">Continue Kit-Building</button>
  </div>
</div>

<div id="bug-dialog" class="card d-none">
  <h6 class="card-header d-flex">
    <span class="drag-handle flex-fill">
      <i class="dialog-icon bi bi-bug-fill me-2 text-danger"></i> 
      <span class="dialog-title text-small"><small>Bug: Select Correct Concept</small></span></span>
    <i class="bi bi-x-lg bt-close bt-x" role="button"></i>
  </h6>
  <div class="card-body">
    <div class="bug-options"></div>
  </div>
  <div class="card-footer text-end">
    <button class="btn btn-sm btn-secondary bt-cancel bt-close px-3"><?php echo Lang::l('ok'); ?></button>
  </div>
</div>