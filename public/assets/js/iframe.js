 
function previewPDFone() {
var fileInput = document.getElementById('formFileone');
var pdfPreview = document.getElementById('pdfPreviewone');
  
if (fileInput.files.length > 0) {
  var file = fileInput.files[0];
  var reader = new FileReader();

  reader.onloadend = function () {
      pdfPreview.src = reader.result;
      pdfPreview.style.display = 'block';
  };

  // Read the selected file as Data URL
  reader.readAsDataURL(file);
} else {
  // If no file is selected, hide the preview
  pdfPreview.src = '#';
  pdfPreview.style.display = 'none';
}

}

function previewPDFtwo() {
    var fileInput = document.getElementById('formFiletwo');
    var pdfPreview = document.getElementById('pdfPreviewtwo');
      
    if (fileInput.files.length > 0) {
      var file = fileInput.files[0];
      var reader = new FileReader();
    
      reader.onloadend = function () {
          pdfPreview.src = reader.result;
          pdfPreview.style.display = 'block';
      };
    
      // Read the selected file as Data URL
      reader.readAsDataURL(file);
    } else {
      // If no file is selected, hide the preview
      pdfPreview.src = '#';
      pdfPreview.style.display = 'none';
    }
    
    }


    function previewPDFthree() {
        var fileInput = document.getElementById('formFilethree');
        var pdfPreview = document.getElementById('pdfPreviewthree');
          
        if (fileInput.files.length > 0) {
          var file = fileInput.files[0];
          var reader = new FileReader();
        
          reader.onloadend = function () {
              pdfPreview.src = reader.result;
              pdfPreview.style.display = 'block';
          };
        
          // Read the selected file as Data URL
          reader.readAsDataURL(file);
        } else {
          // If no file is selected, hide the preview
          pdfPreview.src = '#';
          pdfPreview.style.display = 'none';
        }
        
        }


        function previewPDFfour() {
            var fileInput = document.getElementById('formFilefour');
            var pdfPreview = document.getElementById('pdfPreviewfour');
              
            if (fileInput.files.length > 0) {
              var file = fileInput.files[0];
              var reader = new FileReader();
            
              reader.onloadend = function () {
                  pdfPreview.src = reader.result;
                  pdfPreview.style.display = 'block';
              };
            
              // Read the selected file as Data URL
              reader.readAsDataURL(file);
            } else {
              // If no file is selected, hide the preview
              pdfPreview.src = '#';
              pdfPreview.style.display = 'none';
            }
            
            }
    
            function previewPDFfive() {
                var fileInput = document.getElementById('formFilefive');
                var pdfPreview = document.getElementById('pdfPreviewfive');
                  
                if (fileInput.files.length > 0) {
                  var file = fileInput.files[0];
                  var reader = new FileReader();
                
                  reader.onloadend = function () {
                      pdfPreview.src = reader.result;
                      pdfPreview.style.display = 'block';
                  };
                
                  // Read the selected file as Data URL
                  reader.readAsDataURL(file);
                } else {
                  // If no file is selected, hide the preview
                  pdfPreview.src = '#';
                  pdfPreview.style.display = 'none';
                }
                
                }

                function previewPDFsix() {
                                var filesInput = document.getElementById('formFilesix');
                                var previewsContainer = document.getElementById('pdfPreviewsContainer');
                                
                                previewsContainer.innerHTML = ''; // Clear previous previews
                              
                                for (var i = 0; i < filesInput.files.length; i++) {
                                  var file = filesInput.files[i];
                                  
                                  // Create a new iframe for each PDF file
                                  var iframe = document.createElement('iframe');
                                  iframe.style.width = '40%';
                                  iframe.style.border = '1px solid #ccc';
                                  iframe.style.margin = '5px 5px';
                                  
                                  // Set a unique ID for each iframe
                                  iframe.id = 'pdfPreview_' + i;
                                  
                                  previewsContainer.appendChild(iframe);
                              
                                  // Display the PDF in the iframe
                                  displayPDF(file, iframe.id);
                                }
                              }
                              
                      function previewPDFSeven() {
                        var fileInput = document.getElementById('formFileSeven');
                        var pdfPreview = document.getElementById('pdfPreviewSeven');
                          
                        if (fileInput.files.length > 0) {
                          var file = fileInput.files[0];
                          var reader = new FileReader();
                        
                          reader.onloadend = function () {
                              pdfPreview.src = reader.result;
                              pdfPreview.style.display = 'block';
                          };
                        
                          // Read the selected file as Data URL
                          reader.readAsDataURL(file);
                        } else {
                          // If no file is selected, hide the preview
                          pdfPreview.src = '#';
                          pdfPreview.style.display = 'none';
                        }
                        
                        }


                        function UpdateBoyAadhar() {
                          var fileInput = document.getElementById('UpdateAadhar');
                          var pdfPreview = document.getElementById('pdfPreviewAadhar');
                            
                          if (fileInput.files.length > 0) {
                            var file = fileInput.files[0];
                            var reader = new FileReader();
                          
                            reader.onloadend = function () {
                                pdfPreview.src = reader.result;
                                pdfPreview.style.display = 'block';
                            };
                          
                            // Read the selected file as Data URL
                            reader.readAsDataURL(file);
                          } else {
                            // If no file is selected, hide the preview
                            pdfPreview.src = '#';
                            pdfPreview.style.display = 'none';
                          }
                          
                          }

                          function UpdateBoyPan() {
                            var fileInput = document.getElementById('UpdatePan');
                            var pdfPreview = document.getElementById('pdfPreviewPan');
                              
                            if (fileInput.files.length > 0) {
                              var file = fileInput.files[0];
                              var reader = new FileReader();
                            
                              reader.onloadend = function () {
                                  pdfPreview.src = reader.result;
                                  pdfPreview.style.display = 'block';
                              };
                            
                              // Read the selected file as Data URL
                              reader.readAsDataURL(file);
                            } else {
                              // If no file is selected, hide the preview
                              pdfPreview.src = '#';
                              pdfPreview.style.display = 'none';
                            }
                            
                            }
                            function UpdateBoyLicence() {
                              var fileInput = document.getElementById('UpdateLicience');
                              var pdfPreview = document.getElementById('pdfPreviewLicience');
                                
                              if (fileInput.files.length > 0) {
                                var file = fileInput.files[0];
                                var reader = new FileReader();
                              
                                reader.onloadend = function () {
                                    pdfPreview.src = reader.result;
                                    pdfPreview.style.display = 'block';
                                };
                              
                                // Read the selected file as Data URL
                                reader.readAsDataURL(file);
                              } else {
                                // If no file is selected, hide the preview
                                pdfPreview.src = '#';
                                pdfPreview.style.display = 'none';
                              }
                              
                              }