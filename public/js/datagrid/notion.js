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

            data = response.notions;
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
            if (options.filter) {
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
            }

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
            property: 'id_notion',
            label: 'ID',
            sortable: true
          },
          {
            property: 'code_country',
            label: 'País',
            sortable: true
          },
          {
            property: 'title',
            label: 'Título',
            sortable: true
          },
          {
            property: 'description',
            label: 'Descripción',
            sortable: true
          },
          {
            property: 'video',
            label: 'Video',
            sortable: true
          },
          {
            property: 'name_category',
            label: 'Categoría',
            sortable: true
          },
          {
            property: 'likes',
            label: 'Likes',
            sortable: true
          },
          {
            property: 'name_city',
            label: 'Distrito',
            sortable: true
          },
          {
            property: 'vip',
            label: 'VIP',
            sortable: true
          },
          {
            property: 'status',
            label: 'Estado',
            sortable: true
          },
          {
            property: 'options',
            label: 'Opciones'
            //sortable: true
          }
        ],

          // Create IMG tag for each returned image
          formatter: function (items) {
            $.each(items, function (index, item) {
              var url_active = $('#url_active').val();
              var url_desactive = $('#url_desactive').val();
              var url_vip = $('#url_vip').val();
              var url_notvip = $('#url_notvip').val();
              var url_edit = $('#url_edit').val();
              var url_delete = $('#url_delete').val();
              // video si existe
              if(item.video==null || item.video==""){
                item.video = "No hay video";
              }else{
                var video = item.video;
                var id_yt = video.split("=");
                item.video='<span class="thumb"><img src="http://img.youtube.com/vi/'+id_yt[1]+'/2.jpg" class="img-rounded"></span>';
              }
              // Estado de item
              if(item.status==1){
                item.status = '<a href="'+url_desactive+item.id_notion+'" class="btn btn-sm btn-icon btn-success"><i class="fa fa-check-circle"></i></a>';
              }else{
                item.status = '<a href="'+url_active+item.id_notion+'" class="btn btn-sm btn-icon btn-danger"><i class="fa fa-times-circle"></i></a>';
              }
              // VIP de item
              if(item.vip==1){
                item.vip = '<a href="'+url_notvip+item.id_notion+'" class="btn btn-sm btn-icon btn-warning"><i class="fa fa-star"></i></a>';
              }else{
                item.vip = '<a href="'+url_vip+item.id_notion+'" class="btn btn-sm btn-icon btn-default"><i class="fa fa-star-o"></i></a>';
              }
              // Options de item
              item.options = '<a href="'+url_edit+item.id_notion+'" class="btn btn-sm btn-icon btn-info"><i class="fa fa-pencil"></i></a> <a href="'+url_delete+item.id_notion+'" class="btn btn-sm btn-icon btn-danger"><i class="fa fa-trash-o"></i></a>';
              item.like = item.like+' Like';
            });
          }
      })
      });
    });

  });
}(window.jQuery);