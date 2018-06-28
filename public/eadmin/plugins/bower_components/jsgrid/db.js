(function() {

    var db = {

        loadData: function(filter) {
            return $.grep(this.racks, function(client) {
                return (!filter.id || client.id === filter.id)
                    && (!filter.name || client.name.indexOf(filter.name) > -1);
            });
        },

        insertItem: function(insertingClient) {
            this.clients.push(insertingClient);
        },

        updateItem: function(updatingClient) { },

        deleteItem: function(deletingClient) {
            var clientIndex = $.inArray(deletingClient, this.clients);
            this.clients.splice(clientIndex, 1);
        }

    };

    window.db = db;


    var book = {

        loadData: function(filter) {
            return $.grep(this.data, function(client) {
                return (!filter.id || client.id === filter.id)
                    && (!filter.title || client.title.indexOf(filter.title) > -1)
                    && (!filter.author || client.author.indexOf(filter.author) > -1)
                    && (!filter.published_year || client.published_year.indexOf(filter.published_year) > -1);
            });
        },

        insertItem: function(insertingClient) {
            this.clients.push(insertingClient);
        },

        updateItem: function(updatingClient) { },

        deleteItem: function(deletingClient) {
            var clientIndex = $.inArray(deletingClient, this.clients);
            this.clients.splice(clientIndex, 1);
        }

    };

    window.book = book;

    /*****************************************************/

    var menuCategories = {

        loadData: function(filter) {
            return $.grep(this.data, function(client) {
                return (!filter.id || client.id === filter.id)
                    && (!filter.name || client.name.indexOf(filter.name) > -1)
                    && (!filter.archive || client.archive === filter.archive)
                    && (filter.Married === undefined || client.Married === filter.Married);
            });
        },

        insertItem: function(insertingClient) {
            this.clients.push(insertingClient);
        },

        updateItem: function(updatingClient) { },

        deleteItem: function(deletingClient) {
            var clientIndex = $.inArray(deletingClient, this.clients);
            this.clients.splice(clientIndex, 1);
        }

    };

    window.menuCategories = menuCategories;

    /*****************************************************/

    var menuItems = {

        loadData: function(filter) {
            return $.grep(this.data, function(client) {
                return (!filter.id || client.id === filter.id)
                    && (!filter.name || client.name.indexOf(filter.name) > -1)
                    && (!filter.price || client.price === filter.price)
                    && (!filter.archive || client.archive === filter.archive)
                    && (filter.Married === undefined || client.Married === filter.Married);
            });
        },

        insertItem: function(insertingClient) {
            this.clients.push(insertingClient);
        },

        updateItem: function(updatingClient) { },

        deleteItem: function(deletingClient) {
            var clientIndex = $.inArray(deletingClient, this.clients);
            this.clients.splice(clientIndex, 1);
        }

    };

    window.menuItems = menuItems;

    /*****************************************************/

    var noots = {

        loadData: function(filter) {
            return $.grep(this.data, function(client) {
                return (!filter.id || client.id === filter.id)
                    && (!filter.name || client.name.indexOf(filter.name) > -1)
                    && (!filter.description || client.description === filter.description)
                    && (!filter.archive || client.archive === filter.archive)
                    && (filter.Married === undefined || client.Married === filter.Married);
            });
        },

        insertItem: function(insertingClient) {
            this.clients.push(insertingClient);
        },

        updateItem: function(updatingClient) { },

        deleteItem: function(deletingClient) {
            var clientIndex = $.inArray(deletingClient, this.clients);
            this.clients.splice(clientIndex, 1);
        }

    };

    window.noots = noots;

}());