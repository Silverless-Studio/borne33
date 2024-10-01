'use strict';
(function ($) {
  /* global acf */

  // Ensure acf is defined
  if (typeof acf === 'undefined') {
    return;
  }

  const flexFields = acf.getFields({
    type: 'flexible_content'
  })

  for (const field of flexFields) {
    const originalFunction = field.getLayoutsCategories
    field.getLayoutsCategories = () => {
      var html = originalFunction.call(field)
      html = html.replace('<span class="dashicons dashicons-menu"></span>', 'All')
      return html;
    }
  }

  $('.acf-fields .acf-field[data-name=container_width]').on('change', 'input[type=radio]', function () {
    var $fieldGroup = $(this).closest('.acf-fields')
    limitOffsets($fieldGroup)
  })

  function limitOffsets($fieldGroup) {
    var val = $($fieldGroup).find(`.acf-field[data-name=container_width] input[type=radio]:checked`).val()
    var currentOffset = parseInt($($fieldGroup).find(`.acf-field[data-name=container_offset] input[type=radio]:checked`).val().replace('col-offset-', ''))

    if (val == 'extended') {
      val = '12'
    }
    var width = parseInt(val.replace('col-', ''))
    var maxOffset = (12 - width) / 2;

    $($fieldGroup).find(`.acf-field[data-name=container_offset] input[type=radio]`).attr('disabled', 'disabled')
    $($fieldGroup).find(`.acf-field[data-name=container_offset] input[type=radio]`).closest('label').addClass('disabled')

    if (currentOffset > maxOffset) {
      $($fieldGroup).find(`.acf-field[data-name=container_offset] input[type=radio][value=col-offset-${currentOffset}]`).removeAttr('checked')
      $($fieldGroup).find(`.acf-field[data-name=container_offset] input[type=radio][value=col-offset-${currentOffset}]`).closest('label').removeClass('selected')

      $($fieldGroup).find(`.acf-field[data-name=container_offset] input[type=radio][value=col-offset-${maxOffset}]`).attr('checked', 'checked')
      $($fieldGroup).find(`.acf-field[data-name=container_offset] input[type=radio][value=col-offset-${maxOffset}]`).closest('label').addClass('selected')
    }

    for (var offset = 0; offset <= maxOffset; offset++) {
      $($fieldGroup).find(`.acf-field[data-name=container_offset] input[type=radio][value=col-offset-${offset}]`).removeAttr('disabled')
      $($fieldGroup).find(`.acf-field[data-name=container_offset] input[type=radio][value=col-offset-${offset}]`).closest('label').removeClass('disabled')
    }
  }

  function initialOffsetLimits() {
    var $fieldGroups = $('.acf-fields .acf-field[data-name=container_width]').closest('.acf-fields')
    for (var $fieldGroup of $fieldGroups) {
      limitOffsets($fieldGroup)
    }
  }

  initialOffsetLimits()

})(jQuery);