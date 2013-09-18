var collectionHolder = $('#form_affiliate_dependents');

    var addTagLink = $('<a href="#" class="add-dependent-link">Adicionar dependente</a>');
    var newLinkLi  = $('<li></li>').append(addTagLink);

    jQuery(document).ready(function() {
      collectionHolder.append(newLinkLi);

      collectionHolder.data('index', collectionHolder.find(':input').length);

      collectionHolder.find('li.dependent-form').each(function() {
        addDependentDeleteLink($(this));
      });

      addTagLink.on('click', function(e) {
        e.preventDefault();

        if (collectionHolder.find('li.dependent-form').length < 5) {
          addDependentForm(collectionHolder, newLinkLi);
        } else {
          alert('São permitidos somente 5 dependentes');
        }
      });
    });

    function addDependentDeleteLink(formLi) {
      var removeDependentLink = $('<a href="#">Remover dependente</li>');

      formLi.append(removeDependentLink);

      removeDependentLink.on('click', function(e) {
        e.preventDefault();

        formLi.remove();
      });
    }

    function addDependentForm(collectionHolder, linkLi) {
      var prototype = collectionHolder.data('prototype');

      var index = collectionHolder.data('index');

      var newForm = prototype.replace('/__NAME__/g', index);

      collectionHolder.data('index', index + 1);

      var newFormLi = $('<li class="dependent-form"></li>').append(newForm);
      linkLi.before(newFormLi);
      addDependentDeleteLink(newFormLi);
    }