$(document).ready(function() {

    var Report = JS.Class({
        construct: function (data) {
            var self = this;

            self.id = data.id;
            self.message = ko.observable(data.message);
            self.sector = ko.observable(data.sector);
            self.source = ko.observable(data.source);
            self.confirmed = ko.observable(data.confirmed);
            self.sent = ko.observable(data.sent);
        }


    });

    function ReportsApplication() {


        var self = this;

        self.id = ko.observable();
        self.message = ko.observable();
        self.sector = ko.observable();
        self.source = ko.observable();
        self.confirmed = ko.observable();
        self.sent = ko.observable();
        self.reportsHea = ko.observableArray([]);
        self.reportsImm = ko.observableArray([]);
        self.reportsSec = ko.observableArray([]);


        self.loadReports = function() {

            $.ajax({
                type:"GET",
                url:"/api/unconfirmed_reports",
                success:function (data) {
                    if (_.isArray(data)) {
                        var modelsSec = [];
                        var modelsImm = [];
                        var modelsHea = [];
                        _.each(data, function (item) {
                            if(item.sector == 'security') {
                                modelsSec.push(new Report(item));
                            }
                            if(item.sector == 'health') {
                                modelsHea.push(new Report(item));
                            }
                            if(item.sector == 'immigration') {
                                modelsImm.push(new Report(item));
                            }

                        });
                        self.reportsHea(modelsHea);
                        self.reportsSec(modelsSec);
                        self.reportsImm(modelsImm);
                    }
                }
            });
        }

        self.loadReports();

        self.deleteReport = function (report) {

                    $.ajax({
                        url: '/api/delete_report',
                        type: 'post',
                        data: { id: report.id }})
                        .success(function (data) {

                        })
                        .error(function(data) {
                            bootbox.alert("Error deleting report");
                        });
            self.loadReports();

        }

        self.saveReport = function(report) {

            $.ajax({
                url: '/api/save_report',
                type: 'post',
                data: { id: report.id }})
                .success(function (data) {

                })
                .error(function(data) {
                    bootbox.alert("Error saving report");
                });

            self.loadReports();

        }

        setTimeout(function(){
            self.loadReports();
            setTimeout();
        }, 5000);

    }


    if ($('#reports-div').length > 0)
        ko.applyBindings(new ReportsApplication(), $("#reports-div")[0]);

});