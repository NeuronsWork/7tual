!function ($) {

  $(function(){

    // fuelux datagrid
    var DataGridDataSource = function (options) {
      this._formatter = options.formatter;
      this._columns = options.columns;
      this._delay = options.delay;
    };

    DataGridDataSource.prototype = {

      columns: function () {
        return this._columns;
      },

      data: function (options, callback) {
        var url = $('#current_url').val();
        var self = this;

        setTimeout(function () {

          var data = $.extend(true, [], self._data);

          $.ajax(url, {
            dataType: 'json',
            async: false,
            type: 'GET'
          }).done(function (response) {

            data = response.geonames;
            // SEARCHING
            if (options.search) {
              data = _.filter(data, function (item) {
                var match = false;

                _.each(item, function (prop) {
                  if (_.isString(prop) || _.isFinite(prop)) {
                    if (prop.toString().toLowerCase().indexOf(options.search.toLowerCase()) !== -1) match = true;
                  }
                });

                return match;
              });
            }

            // FILTERING
            /*if (options.filter) {
              data = _.filter(data, function (item) {
                switch(options.filter.value) {
                  case 'lt5m':
                    if(item.like < 10000) return true;
                    break;
                  case 'gte5m':
                    if(item.like >= 1000) return true;
                    break;
                  default:
                    return true;
                    break;
                }
              });
            }*/

            var count = data.length;

            // SORTING
            if (options.sortProperty) {
              data = _.sortBy(data, options.sortProperty);
              if (options.sortDirection === 'desc') data.reverse();
            }

            // PAGING
            var startIndex = options.pageIndex * options.pageSize;
            var endIndex = startIndex + options.pageSize;
            var end = (endIndex > count) ? count : endIndex;
            var pages = Math.ceil(count / options.pageSize);
            var page = options.pageIndex + 1;
            var start = startIndex + 1;

            data = data.slice(startIndex, endIndex);

            if (self._formatter) self._formatter(data);

            callback({ data: data, start: start, end: end, count: count, pages: pages, page: page });
          }).fail(function(e){

          });
        }, self._delay);
      }
    };

    $('#MyStretchGrid').each(function() {
      $(this).datagrid({
          dataSource: new DataGridDataSource({
          // Column definitions for Datagrid
          columns: [
          {
            property: 'id_manager',
            label: 'ID',
            sortable: false
          },
          {
            property: 'name_profile',
            label: 'Tipo de Usuario',
            sortable: true
          },
          {
            property: 'user',
            label: 'Usuario',
            sortable: true
          },
          {
            property: 'name',
            label: 'Nombres',
            sortable: true
          },
          {
            property: 'email',
            label: 'Correo electrónico',
            sortable: false
          },
          {
            property: 'date_created',
            label: 'Fechad de creación',
            sortable: true
          },
          {
            property: 'status',
            label: 'Estado',
            sortable: true
          },
          {
            property: 'options',
            label: 'Opciones',
            sortable: true
          }
        ],

          // Create IMG tag for each returned image
          formatter: function (items) {
            $.each(items, function (index, item) {
              var url_active = $('#url_active').val();
              var url_desactive = $('#url_desactive').val();
              //var item.id_country = item.id_country;
              // Estado de item
              if(item.status==1){
                item.status = '<a href="'+url_desactive+item.id_manager+'" class="btn btn-sm btn-icon btn-success"><i class="fa fa-check-circle"></i></a>';
              }else{
                item.status = '<a href="'+url_active+item.id_manager+'" class="btn btn-sm btn-icon btn-danger"><i class="fa fa-times-circle"></i></a>';
              }
              var url_edit = $('#url_edit').val();
              var url_delete = $('#url_delete').val();
              item.options = '<a href="'+url_edit+item.id_manager+'" class="btn btn-sm btn-icon btn-info"><i class="fa fa-pencil"></i></a> <a href="'+url_delete+item.id_manager+'" class="btn btn-sm btn-icon btn-danger"><i class="fa fa-trash-o"></i></a> ';
            });
          }
      })
      });
    });

  });
}(window.jQuery);