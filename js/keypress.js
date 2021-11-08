$('#eml').change(function (event) {
    var element,
        value,
        warningMessage = 'The characters & < > [ ] { } % are not allowed in any field.\
 Please remove them and try again.',
        pattern = /[%&<>\\[\\]{}]/;
    
    if (this.value === "Save"){
      element = $(this).prevAll("#eml");
    } else {
    //   element = $(this).parent().parent().prevAll("tr").find(".forminfree");
    }
    value = element.val();
    
    if (pattern.test(value)) {
      alert(warningMessage);
      event.preventDefault();
    }
});