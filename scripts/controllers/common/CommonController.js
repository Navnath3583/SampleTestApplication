billingApp.controller('CommonController', [
		'$scope',
		'$rootScope',
		'$http',
		'$window',
		'$location',
		'$templateCache',
		'$timeout',
		function($scope, $rootScope, $http, $window, $location, $templateCache,
				$timeout) {
			$scope.testData = "Hello Navnath";

			$scope.addEvents = function() {
				hideModalWindow();
				$("#eventTitle").val();
				$("#eventDate").val();
				//console.log("Event Title----->"+$("#eventTitle").val()+"Event Date---->"+$("#eventDate").val());
				
				/////////////////////////////////////////////////////////////////////////////////////////////////
							var formData = {
								'bookingDate'			:$("#bookingDate").val(),
								'eventDate'			:$("#eventDate").val(),
								'eventUserName'			:$("#eventUserName").val(),
								'eventUserAddress'			:$("#eventUserAddress").val(),
								'clientMobileNo'			:$("#clientMobileNo").val(),
								'eventTime'			:$("#eventTime").val(),
								'eventHallRent'			:$("#eventHallRent").val(),
								'eventPaidAmount'			:$("#eventPaidAmount").val(),
								'eventRemainingAmount'			:$("#eventRemainingAmount").val()
							};

							$.ajax({
								type        : 'POST',
								url         : 'submit_data.php',
								data        : formData,
								dataType    : 'json',
								encode          : true,
								success		:refreshPage()
								})
								
								
				//////////////////////////////////////////////////////////////////////////////////////////////////
				
				
			}
			
			function refreshPage(){
				location.reload();
			}
			
			function displayCalendar(){
			
				$("#my-calendar").zabuto_calendar({
                        ajax: {
                            url: "show_data.php",
                            modal: true
                        }
                    });
			}
			
			function hideModalWindow(){
				$(".modal-backdrop").remove();
				$("#myModal").removeClass("modal fade in").addClass(
						"modal fade");
				$("#myModal").show();
			}

			$(document).ready(function() {
				/*var eventData = [];
				$http.get('data/eventData.json').success(function(data) {
					eventData = data;
					$("#my-calendar").zabuto_calendar({
						action : function() {
							return myDateFunction(this, false);
						},
						ajax : {
							url : "show_data.php",
							modal : true
						},
						data : eventData
					});

					console.log("EventDataAdded");
				});*/
				
				$http.get('display_tables.php').success(function(data) {
					$("#bookingTable").html(data);
				});				
				
				displayCalendar();
				
				
				$('#eventDate').datepicker({
                    format: "mm-dd-yyyy"
                });  
				$('#bookingDate').datepicker({
                    format: "mm-dd-yyyy"
                });  
				
				
			});

			function myDateFunction(calendarObj, fromModal) {
				// $("#date-popover").hide();
				if (fromModal) {
					$("#" + calendarObj.id + "_modal").modal("hide");
				}
				var date = $("#" + calendarObj.id).data("date");
				var title = $("#" + calendarObj.title).data("title");
				var hasEvent = $("#" + calendarObj.id).data("hasEvent");
				//alert("Date----->" + date+"Title----->"+title);
				if (hasEvent && !fromModal) {
					return false;
				}
				return true;
			}

		/*	$scope.submitData = function() {
				var dataStr = this.prepareReq();
				this.postData(dataStr);
			};
			$scope.url = '';// end point url
			$scope.method = 'POST';
			$scope.postData = function(data) {
				$http({
					method : $scope.method,
					url : $scope.url,
					cache : $templateCache,
					data : data
				}).success(function(res, status) {
					alert("data added successfully");
				}).error(function(res, status) {
					alert("Error adding data");
				});
			};
			$scope.prepareReq = function() {
				var pageData = {
					"date" : "2015-12-05",
					"badge" : true,
					"title" : "Example 1"
				};
				var dataStr = JSON.stringify(pageData);

				return dataStr;
			};
*/
		} ]);