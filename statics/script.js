$('button').tooltip({
  trigger: 'click',
  placement: 'bottom'
});

function setTooltip(message) {
  $('button').tooltip('hide')
    .attr('data-original-title', message)
    .tooltip('show');
}

function hideTooltip() {
  setTimeout(function() {
    $('button').tooltip('hide');
  }, 1000);
}

// Clipboard

var clipboard = new Clipboard('button');

clipboard.on('success', function(e) {
  setTooltip('J\'aime pas ca me faire copier!');
  hideTooltip();
});

clipboard.on('error', function(e) {
  setTooltip('J\'aime pas ca les erreurs!');
  hideTooltip();
});

 $(document).ready(function() {


  $(".scroll").jscroll({
  debug: true,
  autoTrigger: true,
  autoTriggerUntil: false,
  loadingHtml: '<span>jaimepas.ca le loading...</span>',
  padding: 25,
  },);
 });
