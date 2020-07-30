$(function () {
  $('[data-toggle="tooltip"]').tooltip();

  $('#content iframe').on("load", function() {
    this.height = this.contentWindow.document.documentElement.scrollHeight + 30 + 'px';
  });

  $('#content iframe').each(function() {
    this.height = this.contentWindow.document.documentElement.scrollHeight + 30 + 'px';
  });
});
