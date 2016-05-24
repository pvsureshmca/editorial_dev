var TreeView = function () {

    return {
        //main function to initiate the module
        init: function (assets_url) {
 
            var DataSourceTree = function (options) {
                this._data  = options.data;
                this._delay = options.delay;
            };

            DataSourceTree.prototype = {

                data: function (options, callback) {
                    var self = this;

                    setTimeout(function () {
                        var data = $.extend(true, [], self._data);

                        callback({ data: data });

                    }, this._delay)
                }
            };

            // INITIALIZING TREE
           
        
            var treeDataSource4 = new DataSourceTree({
                data: [
                    { name: 'Dashboard<div class="tree-actions"><i class="fa fa-plus"></i><i class="fa fa-trash-o"></i><i class="fa fa-refresh"></i></div>', type: 'folder', additionalParameters: { id: 'F11' } },
                    { name: 'View Category<div class="tree-actions"><i class="fa fa-plus"></i><i class="fa fa-trash-o"></i><i class="fa fa-refresh"></i></div>', type: 'folder', additionalParameters: { id: 'F12' } }
                   /* { name: '<i class="fa  fa-gear "></i> Works <div class="tree-actions"><i class="fa fa-plus"></i><i class="fa fa-trash-o"></i><i class="fa fa-refresh"></i></div>', type: 'item', additionalParameters: { id: 'I12' } }*/
                ],
                delay: 400
            });

         
          

            $('#FlatTree4').tree({
                selectable: false,
                dataSource: treeDataSource4,
                loadingHTML: '<img src="'+assets_url+'/images/input-spinner.gif"/>',
            });


        }

    };

}();


