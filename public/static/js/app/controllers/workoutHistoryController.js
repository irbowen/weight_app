/*
 * Controller for workout history
 */

app.controller('workoutHistoryController',
  function($scope, $http, liftFactory, workoutFactory) {

  workoutFactory.get_all_workouts($scope.user_id).then(
    function (results) {
      $scope.all_workouts = results.data;
    });

  $scope.myChartObject = {};

    $scope.myChartObject.type = "BarChart";

    $scope.onions = [
        {v: "Onions"},
        {v: 3},
    ];

    $scope.myChartObject.data = {"cols": [
        {id: "t", label: "Topping", type: "string"},
        {id: "s", label: "Slices", type: "number"}
    ], "rows": [
        {c: [
            {v: "Mushrooms"},
            {v: 3},
        ]},
        {c: $scope.onions},
        {c: [
            {v: "Olives"},
            {v: 31}
        ]},
        {c: [
            {v: "Zucchini"},
            {v: 1},
        ]},
        {c: [
            {v: "Pepperoni"},
            {v: 2},
        ]}
    ]};

    $scope.myChartObject.options = {
        'title': 'How Much Pizza I Ate Last Night'
    };

});
