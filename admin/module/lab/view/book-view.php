<div class="p-2">
  <a href="<?php echo $this->location('m/x/lab/book'); ?>" class="btn btn-secondary btn-sm"><i class="bi bi-chevron-left"></i> Back</a>
</div>

<div id="outerContainer">

<div id="sidebarContainer">
  <div id="toolbarSidebar" class="toolbarHorizontalGroup">
    <div id="toolbarSidebarLeft">
      <div id="sidebarViewButtons" class="toolbarHorizontalGroup toggled" role="radiogroup">
        <button id="viewThumbnail" class="toolbarButton toggled" type="button" title="Show Thumbnails" tabindex="0" data-l10n-id="pdfjs-thumbs-button" role="radio" aria-checked="true" aria-controls="thumbnailView">
           <span data-l10n-id="pdfjs-thumbs-button-label">Thumbnails</span>
        </button>
        <button id="viewOutline" class="toolbarButton" type="button" title="Show Document Outline (double-click to expand/collapse all items)" tabindex="0" data-l10n-id="pdfjs-document-outline-button" role="radio" aria-checked="false" aria-controls="outlineView">
           <span data-l10n-id="pdfjs-document-outline-button-label">Document Outline</span>
        </button>
        <button id="viewAttachments" class="toolbarButton" type="button" title="Show Attachments" tabindex="0" data-l10n-id="pdfjs-attachments-button" role="radio" aria-checked="false" aria-controls="attachmentsView">
           <span data-l10n-id="pdfjs-attachments-button-label">Attachments</span>
        </button>
        <button id="viewLayers" class="toolbarButton" type="button" title="Show Layers (double-click to reset all layers to the default state)" tabindex="0" data-l10n-id="pdfjs-layers-button" role="radio" aria-checked="false" aria-controls="layersView">
           <span data-l10n-id="pdfjs-layers-button-label">Layers</span>
        </button>
      </div>
    </div>

    <div id="toolbarSidebarRight">
      <div id="outlineOptionsContainer" class="toolbarHorizontalGroup">
        <div class="verticalToolbarSeparator"></div>

        <button id="currentOutlineItem" class="toolbarButton" type="button" disabled="disabled" title="Find Current Outline Item" tabindex="0" data-l10n-id="pdfjs-current-outline-item-button">
          <span data-l10n-id="pdfjs-current-outline-item-button-label">Current Outline Item</span>
        </button>
      </div>
    </div>
  </div>
  <div id="sidebarContent">
    <div id="thumbnailView">
    </div>
    <div id="outlineView" class="hidden">
    </div>
    <div id="attachmentsView" class="hidden">
    </div>
    <div id="layersView" class="hidden">
    </div>
  </div>
  <div id="sidebarResizer"></div>
</div>  <!-- sidebarContainer -->

<div id="mainContainer">
  <div class="toolbar">
    <div id="toolbarContainer">
      <div id="toolbarViewer" class="toolbarHorizontalGroup">
        <div id="toolbarViewerLeft" class="toolbarHorizontalGroup">
          <button id="sidebarToggleButton" class="toolbarButton" type="button" title="Toggle Sidebar" tabindex="0" data-l10n-id="pdfjs-toggle-sidebar-button" aria-expanded="false" aria-haspopup="true" aria-controls="sidebarContainer">
            <span data-l10n-id="pdfjs-toggle-sidebar-button-label">Toggle Sidebar</span>
          </button>
          <div class="toolbarButtonSpacer"></div>
          <div class="toolbarButtonWithContainer">
            <button id="viewFindButton" class="toolbarButton" type="button" title="Find in Document" tabindex="0" data-l10n-id="pdfjs-findbar-button" aria-expanded="false" aria-controls="findbar">
              <span data-l10n-id="pdfjs-findbar-button-label">Find</span>
            </button>
            <div class="hidden doorHanger toolbarHorizontalGroup" id="findbar">
              <div id="findInputContainer" class="toolbarHorizontalGroup">
                <span class="loadingInput end toolbarHorizontalGroup">
                  <input id="findInput" class="toolbarField" title="Find" placeholder="Find in document…" tabindex="0" data-l10n-id="pdfjs-find-input" aria-invalid="false">
                </span>
                <div class="toolbarHorizontalGroup">
                  <button id="findPreviousButton" class="toolbarButton" type="button" title="Find the previous occurrence of the phrase" tabindex="0" data-l10n-id="pdfjs-find-previous-button">
                    <span data-l10n-id="pdfjs-find-previous-button-label">Previous</span>
                  </button>
                  <div class="splitToolbarButtonSeparator"></div>
                  <button id="findNextButton" class="toolbarButton" type="button" title="Find the next occurrence of the phrase" tabindex="0" data-l10n-id="pdfjs-find-next-button">
                    <span data-l10n-id="pdfjs-find-next-button-label">Next</span>
                  </button>
                </div>
              </div>

              <div id="findbarOptionsOneContainer" class="toolbarHorizontalGroup">
                <div class="toggleButton toolbarLabel">
                  <input type="checkbox" id="findHighlightAll" tabindex="0" />
                  <label for="findHighlightAll" data-l10n-id="pdfjs-find-highlight-checkbox">Highlight All</label>
                </div>
                <div class="toggleButton toolbarLabel">
                  <input type="checkbox" id="findMatchCase" tabindex="0" />
                  <label for="findMatchCase" data-l10n-id="pdfjs-find-match-case-checkbox-label">Match Case</label>
                </div>
              </div>
              <div id="findbarOptionsTwoContainer" class="toolbarHorizontalGroup">
                <div class="toggleButton toolbarLabel">
                  <input type="checkbox" id="findMatchDiacritics" tabindex="0" />
                  <label for="findMatchDiacritics" data-l10n-id="pdfjs-find-match-diacritics-checkbox-label">Match Diacritics</label>
                </div>
                <div class="toggleButton toolbarLabel">
                  <input type="checkbox" id="findEntireWord" tabindex="0" />
                  <label for="findEntireWord" data-l10n-id="pdfjs-find-entire-word-checkbox-label">Whole Words</label>
                </div>
              </div>

              <div id="findbarMessageContainer" class="toolbarHorizontalGroup" aria-live="polite">
                <span id="findResultsCount" class="toolbarLabel"></span>
                <span id="findMsg" class="toolbarLabel"></span>
              </div>
            </div>  <!-- findbar -->
          </div>
          <div class="toolbarHorizontalGroup hiddenSmallView">
            <button class="toolbarButton" title="Previous Page" type="button" id="previous" tabindex="0" data-l10n-id="pdfjs-previous-button">
              <span data-l10n-id="pdfjs-previous-button-label">Previous</span>
            </button>
            <div class="splitToolbarButtonSeparator"></div>
            <button class="toolbarButton" type="button" title="Next Page" id="next" tabindex="0" data-l10n-id="pdfjs-next-button">
              <span data-l10n-id="pdfjs-next-button-label">Next</span>
            </button>
          </div>
          <div class="toolbarHorizontalGroup">
            <span class="loadingInput start toolbarHorizontalGroup">
              <input type="number" id="pageNumber" class="toolbarField" title="Page" value="1" min="1" tabindex="0" data-l10n-id="pdfjs-page-input" autocomplete="off">
            </span>
            <span id="numPages" class="toolbarLabel"></span>
          </div>
        </div>
        <div id="toolbarViewerMiddle" class="toolbarHorizontalGroup">
          <div class="toolbarHorizontalGroup">
            <button id="zoomOutButton" class="toolbarButton" type="button" title="Zoom Out" tabindex="0" data-l10n-id="pdfjs-zoom-out-button">
              <span data-l10n-id="pdfjs-zoom-out-button-label">Zoom Out</span>
            </button>
            <div class="splitToolbarButtonSeparator"></div>
            <button id="zoomInButton" class="toolbarButton" type="button" title="Zoom In" tabindex="0" data-l10n-id="pdfjs-zoom-in-button">
              <span data-l10n-id="pdfjs-zoom-in-button-label">Zoom In</span>
            </button>
          </div>
          <span id="scaleSelectContainer" class="dropdownToolbarButton">
            <select id="scaleSelect" title="Zoom" tabindex="0" data-l10n-id="pdfjs-zoom-select">
              <option id="pageAutoOption" title="" value="auto" selected="selected" data-l10n-id="pdfjs-page-scale-auto">Automatic Zoom</option>
              <option id="pageActualOption" title="" value="page-actual" data-l10n-id="pdfjs-page-scale-actual">Actual Size</option>
              <option id="pageFitOption" title="" value="page-fit" data-l10n-id="pdfjs-page-scale-fit">Page Fit</option>
              <option id="pageWidthOption" title="" value="page-width" data-l10n-id="pdfjs-page-scale-width">Page Width</option>
              <option id="customScaleOption" title="" value="custom" disabled="disabled" hidden="true" data-l10n-id="pdfjs-page-scale-percent" data-l10n-args='{ "scale": 0 }'>0%</option>
              <option title="" value="0.5" data-l10n-id="pdfjs-page-scale-percent" data-l10n-args='{ "scale": 50 }'>50%</option>
              <option title="" value="0.75" data-l10n-id="pdfjs-page-scale-percent" data-l10n-args='{ "scale": 75 }'>75%</option>
              <option title="" value="1" data-l10n-id="pdfjs-page-scale-percent" data-l10n-args='{ "scale": 100 }'>100%</option>
              <option title="" value="1.25" data-l10n-id="pdfjs-page-scale-percent" data-l10n-args='{ "scale": 125 }'>125%</option>
              <option title="" value="1.5" data-l10n-id="pdfjs-page-scale-percent" data-l10n-args='{ "scale": 150 }'>150%</option>
              <option title="" value="2" data-l10n-id="pdfjs-page-scale-percent" data-l10n-args='{ "scale": 200 }'>200%</option>
              <option title="" value="3" data-l10n-id="pdfjs-page-scale-percent" data-l10n-args='{ "scale": 300 }'>300%</option>
              <option title="" value="4" data-l10n-id="pdfjs-page-scale-percent" data-l10n-args='{ "scale": 400 }'>400%</option>
            </select>
          </span>
        </div>
        <div id="toolbarViewerRight" class="toolbarHorizontalGroup">
          <div id="editorModeButtons" class="toolbarHorizontalGroup" role="radiogroup">
            <div id="editorHighlight" class="toolbarButtonWithContainer">
              <button id="editorHighlightButton" class="toolbarButton" type="button" disabled="disabled" title="Highlight" role="radio" aria-expanded="false" aria-haspopup="true" aria-controls="editorHighlightParamsToolbar" tabindex="0" data-l10n-id="pdfjs-editor-highlight-button">
                <span data-l10n-id="pdfjs-editor-highlight-button-label">Highlight</span>
              </button>
              <div class="editorParamsToolbar hidden doorHangerRight" id="editorHighlightParamsToolbar">
                <div id="highlightParamsToolbarContainer" class="editorParamsToolbarContainer">
                  <div id="editorHighlightColorPicker" class="colorPicker">
                    <span id="highlightColorPickerLabel" class="editorParamsLabel" data-l10n-id="pdfjs-editor-highlight-colorpicker-label">Highlight color</span>
                  </div>
                  <div id="editorHighlightThickness">
                    <label for="editorFreeHighlightThickness" class="editorParamsLabel" data-l10n-id="pdfjs-editor-free-highlight-thickness-input">Thickness</label>
                    <div class="thicknessPicker">
                      <input type="range" id="editorFreeHighlightThickness" class="editorParamsSlider" data-l10n-id="pdfjs-editor-free-highlight-thickness-title" value="12" min="8" max="24" step="1" tabindex="0">
                    </div>
                  </div>
                  <div id="editorHighlightVisibility">
                    <div class="divider"></div>
                    <div class="toggler">
                      <label for="editorHighlightShowAll" class="editorParamsLabel" data-l10n-id="pdfjs-editor-highlight-show-all-button-label">Show all</label>
                      <button id="editorHighlightShowAll" class="toggle-button" type="button" data-l10n-id="pdfjs-editor-highlight-show-all-button" aria-pressed="true" tabindex="0"></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div id="editorFreeText" class="toolbarButtonWithContainer">
              <button id="editorFreeTextButton" class="toolbarButton" type="button" disabled="disabled" title="Text" role="radio" aria-expanded="false" aria-haspopup="true" aria-controls="editorFreeTextParamsToolbar" tabindex="0" data-l10n-id="pdfjs-editor-free-text-button">
                <span data-l10n-id="pdfjs-editor-free-text-button-label">Text</span>
              </button>
              <div class="editorParamsToolbar hidden doorHangerRight" id="editorFreeTextParamsToolbar">
                <div class="editorParamsToolbarContainer">
                  <div class="editorParamsSetter">
                    <label for="editorFreeTextColor" class="editorParamsLabel" data-l10n-id="pdfjs-editor-free-text-color-input">Color</label>
                    <input type="color" id="editorFreeTextColor" class="editorParamsColor" tabindex="0">
                  </div>
                  <div class="editorParamsSetter">
                    <label for="editorFreeTextFontSize" class="editorParamsLabel" data-l10n-id="pdfjs-editor-free-text-size-input">Size</label>
                    <input type="range" id="editorFreeTextFontSize" class="editorParamsSlider" value="10" min="5" max="100" step="1" tabindex="0">
                  </div>
                </div>
              </div>
            </div>
            <div id="editorInk" class="toolbarButtonWithContainer">
              <button id="editorInkButton" class="toolbarButton" type="button" disabled="disabled" title="Draw" role="radio" aria-expanded="false" aria-haspopup="true" aria-controls="editorInkParamsToolbar" tabindex="0" data-l10n-id="pdfjs-editor-ink-button">
                <span data-l10n-id="pdfjs-editor-ink-button-label">Draw</span>
              </button>
              <div class="editorParamsToolbar hidden doorHangerRight" id="editorInkParamsToolbar">
                <div class="editorParamsToolbarContainer">
                  <div class="editorParamsSetter">
                    <label for="editorInkColor" class="editorParamsLabel" data-l10n-id="pdfjs-editor-ink-color-input">Color</label>
                    <input type="color" id="editorInkColor" class="editorParamsColor" tabindex="0">
                  </div>
                  <div class="editorParamsSetter">
                    <label for="editorInkThickness" class="editorParamsLabel" data-l10n-id="pdfjs-editor-ink-thickness-input">Thickness</label>
                    <input type="range" id="editorInkThickness" class="editorParamsSlider" value="1" min="1" max="20" step="1" tabindex="0">
                  </div>
                  <div class="editorParamsSetter">
                    <label for="editorInkOpacity" class="editorParamsLabel" data-l10n-id="pdfjs-editor-ink-opacity-input">Opacity</label>
                    <input type="range" id="editorInkOpacity" class="editorParamsSlider" value="1" min="0.05" max="1" step="0.05" tabindex="0">
                  </div>
                </div>
              </div>
            </div>
            <div id="editorStamp" class="toolbarButtonWithContainer">
              <button id="editorStampButton" class="toolbarButton" type="button" disabled="disabled" title="Add or edit images" role="radio" aria-expanded="false" aria-haspopup="true" aria-controls="editorStampParamsToolbar" tabindex="0" data-l10n-id="pdfjs-editor-stamp-button">
                <span data-l10n-id="pdfjs-editor-stamp-button-label">Add or edit images</span>
              </button>
              <div class="editorParamsToolbar hidden doorHangerRight menu" id="editorStampParamsToolbar">
                <div class="menuContainer">
                  <button id="editorStampAddImage" class="toolbarButton labeled" type="button" title="Add image" tabindex="0" data-l10n-id="pdfjs-editor-stamp-add-image-button">
                    <span class="editorParamsLabel" data-l10n-id="pdfjs-editor-stamp-add-image-button-label">Add image</span>
                  </button>
                </div>
              </div>
            </div>
          </div>

          <div id="editorModeSeparator" class="verticalToolbarSeparator"></div>

          <div class="toolbarHorizontalGroup hiddenMediumView">
            <button id="printButton" class="toolbarButton" type="button" title="Print" tabindex="0" data-l10n-id="pdfjs-print-button">
              <span data-l10n-id="pdfjs-print-button-label">Print</span>
            </button>

            <button id="downloadButton" class="toolbarButton" type="button" title="Save" tabindex="0" data-l10n-id="pdfjs-save-button">
              <span data-l10n-id="pdfjs-save-button-label">Save</span>
            </button>
          </div>

          <div class="verticalToolbarSeparator hiddenMediumView"></div>

          <div id="secondaryToolbarToggle" class="toolbarButtonWithContainer">
            <button id="secondaryToolbarToggleButton" class="toolbarButton" type="button" title="Tools" tabindex="0" data-l10n-id="pdfjs-tools-button" aria-expanded="false" aria-haspopup="true" aria-controls="secondaryToolbar">
              <span data-l10n-id="pdfjs-tools-button-label">Tools</span>
            </button>
            <div id="secondaryToolbar" class="hidden doorHangerRight menu">
              <div id="secondaryToolbarButtonContainer" class="menuContainer">
                <button id="secondaryOpenFile" class="toolbarButton labeled" type="button" title="Open File" tabindex="0" data-l10n-id="pdfjs-open-file-button">
                  <span data-l10n-id="pdfjs-open-file-button-label">Open</span>
                </button>

                <div class="visibleMediumView">
                  <button id="secondaryPrint" class="toolbarButton labeled" type="button" title="Print" tabindex="0" data-l10n-id="pdfjs-print-button">
                    <span data-l10n-id="pdfjs-print-button-label">Print</span>
                  </button>

                  <button id="secondaryDownload" class="toolbarButton labeled" type="button" title="Save" tabindex="0" data-l10n-id="pdfjs-save-button">
                    <span data-l10n-id="pdfjs-save-button-label">Save</span>
                  </button>

                </div>

                <div class="horizontalToolbarSeparator"></div>

                <button id="presentationMode" class="toolbarButton labeled" type="button" title="Switch to Presentation Mode" tabindex="0" data-l10n-id="pdfjs-presentation-mode-button">
                  <span data-l10n-id="pdfjs-presentation-mode-button-label">Presentation Mode</span>
                </button>

                <a href="#" id="viewBookmark" class="toolbarButton labeled" title="Current Page (View URL from Current Page)" tabindex="0" data-l10n-id="pdfjs-bookmark-button">
                  <span data-l10n-id="pdfjs-bookmark-button-label">Current Page</span>
                </a>

                <div id="viewBookmarkSeparator" class="horizontalToolbarSeparator"></div>

                <button id="firstPage" class="toolbarButton labeled" type="button" title="Go to First Page" tabindex="0" data-l10n-id="pdfjs-first-page-button">
                  <span data-l10n-id="pdfjs-first-page-button-label">Go to First Page</span>
                </button>
                <button id="lastPage" class="toolbarButton labeled" type="button" title="Go to Last Page" tabindex="0" data-l10n-id="pdfjs-last-page-button">
                  <span data-l10n-id="pdfjs-last-page-button-label">Go to Last Page</span>
                </button>

                <div class="horizontalToolbarSeparator"></div>

                <button id="pageRotateCw" class="toolbarButton labeled" type="button" title="Rotate Clockwise" tabindex="0" data-l10n-id="pdfjs-page-rotate-cw-button">
                  <span data-l10n-id="pdfjs-page-rotate-cw-button-label">Rotate Clockwise</span>
                </button>
                <button id="pageRotateCcw" class="toolbarButton labeled" type="button" title="Rotate Counterclockwise" tabindex="0" data-l10n-id="pdfjs-page-rotate-ccw-button">
                  <span data-l10n-id="pdfjs-page-rotate-ccw-button-label">Rotate Counterclockwise</span>
                </button>

                <div class="horizontalToolbarSeparator"></div>

                <div id="cursorToolButtons" role="radiogroup">
                  <button id="cursorSelectTool" class="toolbarButton labeled toggled" type="button" title="Enable Text Selection Tool" tabindex="0" data-l10n-id="pdfjs-cursor-text-select-tool-button" role="radio" aria-checked="true">
                    <span data-l10n-id="pdfjs-cursor-text-select-tool-button-label">Text Selection Tool</span>
                  </button>
                  <button id="cursorHandTool" class="toolbarButton labeled" type="button" title="Enable Hand Tool" tabindex="0" data-l10n-id="pdfjs-cursor-hand-tool-button" role="radio" aria-checked="false">
                    <span data-l10n-id="pdfjs-cursor-hand-tool-button-label">Hand Tool</span>
                  </button>
                </div>

                <div class="horizontalToolbarSeparator"></div>

                <div id="scrollModeButtons" role="radiogroup">
                  <button id="scrollPage" class="toolbarButton labeled" type="button" title="Use Page Scrolling" tabindex="0" data-l10n-id="pdfjs-scroll-page-button" role="radio" aria-checked="false">
                    <span data-l10n-id="pdfjs-scroll-page-button-label">Page Scrolling</span>
                  </button>
                  <button id="scrollVertical" class="toolbarButton labeled toggled" type="button" title="Use Vertical Scrolling" tabindex="0" data-l10n-id="pdfjs-scroll-vertical-button" role="radio" aria-checked="true">
                    <span data-l10n-id="pdfjs-scroll-vertical-button-label">Vertical Scrolling</span>
                  </button>
                  <button id="scrollHorizontal" class="toolbarButton labeled" type="button" title="Use Horizontal Scrolling" tabindex="0" data-l10n-id="pdfjs-scroll-horizontal-button" role="radio" aria-checked="false">
                    <span data-l10n-id="pdfjs-scroll-horizontal-button-label">Horizontal Scrolling</span>
                  </button>
                  <button id="scrollWrapped" class="toolbarButton labeled" type="button" title="Use Wrapped Scrolling" tabindex="0" data-l10n-id="pdfjs-scroll-wrapped-button" role="radio" aria-checked="false">
                    <span data-l10n-id="pdfjs-scroll-wrapped-button-label">Wrapped Scrolling</span>
                  </button>
                </div>

                <div class="horizontalToolbarSeparator"></div>

                <div id="spreadModeButtons" role="radiogroup">
                  <button id="spreadNone" class="toolbarButton labeled toggled" type="button" title="Do not join page spreads" tabindex="0" data-l10n-id="pdfjs-spread-none-button" role="radio" aria-checked="true">
                    <span data-l10n-id="pdfjs-spread-none-button-label">No Spreads</span>
                  </button>
                  <button id="spreadOdd" class="toolbarButton labeled" type="button" title="Join page spreads starting with odd-numbered pages" tabindex="0" data-l10n-id="pdfjs-spread-odd-button" role="radio" aria-checked="false">
                    <span data-l10n-id="pdfjs-spread-odd-button-label">Odd Spreads</span>
                  </button>
                  <button id="spreadEven" class="toolbarButton labeled" type="button" title="Join page spreads starting with even-numbered pages" tabindex="0" data-l10n-id="pdfjs-spread-even-button" role="radio" aria-checked="false">
                    <span data-l10n-id="pdfjs-spread-even-button-label">Even Spreads</span>
                  </button>
                </div>

                <div id="imageAltTextSettingsSeparator" class="horizontalToolbarSeparator hidden"></div>
                <button id="imageAltTextSettings" type="button" class="toolbarButton labeled hidden" title="Image alt text settings" tabindex="0" data-l10n-id="pdfjs-image-alt-text-settings-button" aria-controls="altTextSettingsDialog">
                  <span data-l10n-id="pdfjs-image-alt-text-settings-button-label">Image alt text settings</span>
                </button>

                <div class="horizontalToolbarSeparator"></div>

                <button id="documentProperties" class="toolbarButton labeled" type="button" title="Document Properties…" tabindex="0" data-l10n-id="pdfjs-document-properties-button" aria-controls="documentPropertiesDialog">
                  <span data-l10n-id="pdfjs-document-properties-button-label">Document Properties…</span>
                </button>
              </div>
            </div>  <!-- secondaryToolbar -->
          </div>
        </div>
      </div>
      <div id="loadingBar">
        <div class="progress">
          <div class="glimmer">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="viewerContainer" tabindex="0">
    <div id="viewer" class="pdfViewer"></div>
  </div>
</div> <!-- mainContainer -->

<div id="dialogContainer">
  <dialog id="passwordDialog">
    <div class="row">
      <label for="password" id="passwordText" data-l10n-id="pdfjs-password-label">Enter the password to open this PDF file:</label>
    </div>
    <div class="row">
      <input type="password" id="password" class="toolbarField">
    </div>
    <div class="buttonRow">
      <button id="passwordCancel" class="dialogButton" type="button"><span data-l10n-id="pdfjs-password-cancel-button">Cancel</span></button>
      <button id="passwordSubmit" class="dialogButton" type="button"><span data-l10n-id="pdfjs-password-ok-button">OK</span></button>
    </div>
  </dialog>
  <dialog id="documentPropertiesDialog">
    <div class="row">
      <span id="fileNameLabel" data-l10n-id="pdfjs-document-properties-file-name">File name:</span>
      <p id="fileNameField" aria-labelledby="fileNameLabel">-</p>
    </div>
    <div class="row">
      <span id="fileSizeLabel" data-l10n-id="pdfjs-document-properties-file-size">File size:</span>
      <p id="fileSizeField" aria-labelledby="fileSizeLabel">-</p>
    </div>
    <div class="separator"></div>
    <div class="row">
      <span id="titleLabel" data-l10n-id="pdfjs-document-properties-title">Title:</span>
      <p id="titleField" aria-labelledby="titleLabel">-</p>
    </div>
    <div class="row">
      <span id="authorLabel" data-l10n-id="pdfjs-document-properties-author">Author:</span>
      <p id="authorField" aria-labelledby="authorLabel">-</p>
    </div>
    <div class="row">
      <span id="subjectLabel" data-l10n-id="pdfjs-document-properties-subject">Subject:</span>
      <p id="subjectField" aria-labelledby="subjectLabel">-</p>
    </div>
    <div class="row">
      <span id="keywordsLabel" data-l10n-id="pdfjs-document-properties-keywords">Keywords:</span>
      <p id="keywordsField" aria-labelledby="keywordsLabel">-</p>
    </div>
    <div class="row">
      <span id="creationDateLabel" data-l10n-id="pdfjs-document-properties-creation-date">Creation Date:</span>
      <p id="creationDateField" aria-labelledby="creationDateLabel">-</p>
    </div>
    <div class="row">
      <span id="modificationDateLabel" data-l10n-id="pdfjs-document-properties-modification-date">Modification Date:</span>
      <p id="modificationDateField" aria-labelledby="modificationDateLabel">-</p>
    </div>
    <div class="row">
      <span id="creatorLabel" data-l10n-id="pdfjs-document-properties-creator">Creator:</span>
      <p id="creatorField" aria-labelledby="creatorLabel">-</p>
    </div>
    <div class="separator"></div>
    <div class="row">
      <span id="producerLabel" data-l10n-id="pdfjs-document-properties-producer">PDF Producer:</span>
      <p id="producerField" aria-labelledby="producerLabel">-</p>
    </div>
    <div class="row">
      <span id="versionLabel" data-l10n-id="pdfjs-document-properties-version">PDF Version:</span>
      <p id="versionField" aria-labelledby="versionLabel">-</p>
    </div>
    <div class="row">
      <span id="pageCountLabel" data-l10n-id="pdfjs-document-properties-page-count">Page Count:</span>
      <p id="pageCountField" aria-labelledby="pageCountLabel">-</p>
    </div>
    <div class="row">
      <span id="pageSizeLabel" data-l10n-id="pdfjs-document-properties-page-size">Page Size:</span>
      <p id="pageSizeField" aria-labelledby="pageSizeLabel">-</p>
    </div>
    <div class="separator"></div>
    <div class="row">
      <span id="linearizedLabel" data-l10n-id="pdfjs-document-properties-linearized">Fast Web View:</span>
      <p id="linearizedField" aria-labelledby="linearizedLabel">-</p>
    </div>
    <div class="buttonRow">
      <button id="documentPropertiesClose" class="dialogButton" type="button"><span data-l10n-id="pdfjs-document-properties-close-button">Close</span></button>
    </div>
  </dialog>
  <dialog class="dialog altText" id="altTextDialog" aria-labelledby="dialogLabel" aria-describedby="dialogDescription">
    <div id="altTextContainer" class="mainContainer">
      <div id="overallDescription">
        <span id="dialogLabel" data-l10n-id="pdfjs-editor-alt-text-dialog-label" class="title">Choose an option</span>
        <span id="dialogDescription" data-l10n-id="pdfjs-editor-alt-text-dialog-description">
          Alt text (alternative text) helps when people can’t see the image or when it doesn’t load.
        </span>
      </div>
      <div id="addDescription">
        <div class="radio">
          <div class="radioButton">
            <input type="radio" id="descriptionButton" name="altTextOption" tabindex="0" aria-describedby="descriptionAreaLabel" checked>
            <label for="descriptionButton" data-l10n-id="pdfjs-editor-alt-text-add-description-label">Add a description</label>
          </div>
          <div class="radioLabel">
            <span id="descriptionAreaLabel" data-l10n-id="pdfjs-editor-alt-text-add-description-description">
              Aim for 1-2 sentences that describe the subject, setting, or actions.
            </span>
          </div>
        </div>
        <div class="descriptionArea">
          <textarea id="descriptionTextarea" placeholder="For example, “A young man sits down at a table to eat a meal”" aria-labelledby="descriptionAreaLabel" data-l10n-id="pdfjs-editor-alt-text-textarea" tabindex="0"></textarea>
        </div>
      </div>
      <div id="markAsDecorative">
        <div class="radio">
          <div class="radioButton">
            <input type="radio" id="decorativeButton" name="altTextOption" aria-describedby="decorativeLabel">
            <label for="decorativeButton" data-l10n-id="pdfjs-editor-alt-text-mark-decorative-label">Mark as decorative</label>
          </div>
          <div class="radioLabel">
            <span id="decorativeLabel" data-l10n-id="pdfjs-editor-alt-text-mark-decorative-description">
              This is used for ornamental images, like borders or watermarks.
            </span>
          </div>
        </div>
      </div>
      <div id="buttons">
        <button id="altTextCancel" class="secondaryButton" type="button" tabindex="0"><span data-l10n-id="pdfjs-editor-alt-text-cancel-button">Cancel</span></button>
        <button id="altTextSave" class="primaryButton" type="button" tabindex="0"><span data-l10n-id="pdfjs-editor-alt-text-save-button">Save</span></button>
      </div>
    </div>
  </dialog>
  <dialog class="dialog newAltText" id="newAltTextDialog" aria-labelledby="newAltTextTitle" aria-describedby="newAltTextDescription" tabindex="0">
    <div id="newAltTextContainer" class="mainContainer">
      <div class="title">
        <span id="newAltTextTitle" data-l10n-id="pdfjs-editor-new-alt-text-dialog-edit-label" role="sectionhead" tabindex="0">Edit alt text (image description)</span>
      </div>
      <div id="mainContent">
        <div id="descriptionAndSettings">
          <div id="descriptionInstruction">
            <div id="newAltTextDescriptionContainer">
              <div class="altTextSpinner" role="status" aria-live="polite"></div>
              <textarea id="newAltTextDescriptionTextarea" placeholder="Write your description here…" aria-labelledby="descriptionAreaLabel" data-l10n-id="pdfjs-editor-new-alt-text-textarea" tabindex="0"></textarea>
            </div>
            <span id="newAltTextDescription" role="note" data-l10n-id="pdfjs-editor-new-alt-text-description">Short description for people who can’t see the image or when the image doesn’t load.</span>
            <div id="newAltTextDisclaimer" role="note"><div><span data-l10n-id="pdfjs-editor-new-alt-text-disclaimer1">This alt text was created automatically and may be inaccurate.</span> <a href="https://support.mozilla.org/en-US/kb/pdf-alt-text" target="_blank" rel="noopener noreferrer" id="newAltTextLearnMore" data-l10n-id="pdfjs-editor-new-alt-text-disclaimer-learn-more-url" tabindex="0">Learn more</a></div></div>
          </div>
          <div id="newAltTextCreateAutomatically" class="toggler">
            <button id="newAltTextCreateAutomaticallyButton" class="toggle-button" type="button" aria-pressed="true" tabindex="0"></button>
            <label for="newAltTextCreateAutomaticallyButton" class="togglerLabel" data-l10n-id="pdfjs-editor-new-alt-text-create-automatically-button-label">Create alt text automatically</label>
          </div>
          <div id="newAltTextDownloadModel" class="hidden">
            <span id="newAltTextDownloadModelDescription" data-l10n-id="pdfjs-editor-new-alt-text-ai-model-downloading-progress" aria-valuemin="0" data-l10n-args='{ "totalSize": 0, "downloadedSize": 0 }'>Downloading alt text AI model (0 of 0 MB)</span>
          </div>
        </div>
        <div id="newAltTextImagePreview"></div>
      </div>
      <div id="newAltTextError" class="messageBar">
        <div>
          <div>
            <span class="title" data-l10n-id="pdfjs-editor-new-alt-text-error-title">Couldn’t create alt text automatically</span>
            <span  class="description" data-l10n-id="pdfjs-editor-new-alt-text-error-description">Please write your own alt text or try again later.</span>
          </div>
          <button id="newAltTextCloseButton" class="closeButton" type="button" tabindex="0" title="Close"><span data-l10n-id="pdfjs-editor-new-alt-text-error-close-button">Close</span></button>
        </div>
      </div>
      <div id="newAltTextButtons" class="dialogButtonsGroup">
        <button id="newAltTextCancel" type="button" class="secondaryButton hidden" tabindex="0"><span data-l10n-id="pdfjs-editor-alt-text-cancel-button">Cancel</span></button>
        <button id="newAltTextNotNow" type="button" class="secondaryButton" tabindex="0"><span data-l10n-id="pdfjs-editor-new-alt-text-not-now-button">Not now</span></button>
        <button id="newAltTextSave" type="button" class="primaryButton" tabindex="0"><span data-l10n-id="pdfjs-editor-alt-text-save-button">Save</span></button>
      </div>
    </div>
  </dialog>

  <dialog class="dialog" id="altTextSettingsDialog" aria-labelledby="altTextSettingsTitle">
    <div id="altTextSettingsContainer" class="mainContainer">
      <div class="title">
        <span id="altTextSettingsTitle" data-l10n-id="pdfjs-editor-alt-text-settings-dialog-label" role="sectionhead" tabindex="0" class="title">Image alt text settings</span>
      </div>
      <div id="automaticAltText">
        <span data-l10n-id="pdfjs-editor-alt-text-settings-automatic-title">Automatic alt text</span>
        <div id="automaticSettings">
          <div id="createModelSetting">
            <div class="toggler">
              <button id="createModelButton" type="button" class="toggle-button" aria-pressed="true" tabindex="0"></button>
              <label for="createModelButton" class="togglerLabel" data-l10n-id="pdfjs-editor-alt-text-settings-create-model-button-label">Create alt text automatically</label>
            </div>
            <div id="createModelDescription" class="description">
              <span data-l10n-id="pdfjs-editor-alt-text-settings-create-model-description">Suggests descriptions to help people who can’t see the image or when the image doesn’t load.</span> <a href="https://support.mozilla.org/en-US/kb/pdf-alt-text" target="_blank" rel="noopener noreferrer" id="altTextSettingsLearnMore" data-l10n-id="pdfjs-editor-new-alt-text-disclaimer-learn-more-url" tabindex="0">Learn more</a>
            </div>
          </div>
          <div id="aiModelSettings">
            <div>
              <span data-l10n-id="pdfjs-editor-alt-text-settings-download-model-label" data-l10n-args='{ "totalSize": 180 }'>Alt text AI model (180MB)</span>
              <div id="aiModelDescription" class="description">
                <span data-l10n-id="pdfjs-editor-alt-text-settings-ai-model-description">Runs locally on your device so your data stays private. Required for automatic alt text.</span>
              </div>
            </div>
            <button id="deleteModelButton" type="button" class="secondaryButton" tabindex="0"><span data-l10n-id="pdfjs-editor-alt-text-settings-delete-model-button">Delete</span></button>
            <button id="downloadModelButton" type="button" class="secondaryButton" tabindex="0"><span data-l10n-id="pdfjs-editor-alt-text-settings-download-model-button">Download</span></button>
          </div>
        </div>
      </div>
      <div class="dialogSeparator"></div>
      <div id="altTextEditor">
        <span data-l10n-id="pdfjs-editor-alt-text-settings-editor-title">Alt text editor</span>
        <div id="showAltTextEditor">
          <div class="toggler">
            <button id="showAltTextDialogButton" type="button" class="toggle-button" aria-pressed="true" tabindex="0"></button>
            <label for="showAltTextDialogButton" class="togglerLabel" data-l10n-id="pdfjs-editor-alt-text-settings-show-dialog-button-label">Show alt text editor right away when adding an image</label>
          </div>
          <div id="showAltTextDialogDescription" class="description">
            <span data-l10n-id="pdfjs-editor-alt-text-settings-show-dialog-description">Helps you make sure all your images have alt text.</span>
          </div>
        </div>
      </div>
      <div id="buttons" class="dialogButtonsGroup">
        <button id="altTextSettingsCloseButton" type="button" class="primaryButton" tabindex="0"><span data-l10n-id="pdfjs-editor-alt-text-settings-close-button">Close</span></button>
      </div>
    </div>
  </dialog>
  <dialog id="printServiceDialog" style="min-width: 200px;">
    <div class="row">
      <span data-l10n-id="pdfjs-print-progress-message">Preparing document for printing…</span>
    </div>
    <div class="row">
      <progress value="0" max="100"></progress>
      <span data-l10n-id="pdfjs-print-progress-percent" data-l10n-args='{ "progress": 0 }' class="relative-progress">0%</span>
    </div>
    <div class="buttonRow">
      <button id="printCancel" class="dialogButton" type="button"><span data-l10n-id="pdfjs-print-progress-close-button">Cancel</span></button>
    </div>
  </dialog>
</div>  <!-- dialogContainer -->

<div id="editorUndoBar" class="messageBar" role="status" aria-labelledby="editorUndoBarMessage" tabindex="-1" hidden>
  <div>
    <div>
      <span id="editorUndoBarMessage" class="description"></span>
    </div>
    <button id="editorUndoBarUndoButton" class="undoButton" type="button" tabindex="0" title="Undo" data-l10n-id="pdfjs-editor-undo-bar-undo-button">
      <span data-l10n-id="pdfjs-editor-undo-bar-undo-button-label">Undo</span>
    </button>
    <button id="editorUndoBarCloseButton" class="closeButton" type="button" tabindex="0" title="Close" data-l10n-id="pdfjs-editor-undo-bar-close-button">
      <span data-l10n-id="pdfjs-editor-undo-bar-close-button-label">Close</span>
    </button>
  </div>
</div> <!-- editorUndoBar -->

</div> <!-- outerContainer -->
<div id="printContainer"></div>
