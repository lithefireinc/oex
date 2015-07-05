new Vue({
    el: "#create-survey",
    data: {
        survey: {
            title: '',
            description: '',
            instructions: '',
            question_set_id: null,
            faculty_id: null,
            start_date: null,
            expires: null,
            per_page: 10
        },
        questionSets: [],
        faculties: [],
        errors: []
    },
    methods: {
        fetchQuestionSet: function(){
            this.$http.get('/questionSetList', function(questionSets){
                this.questionSets = questionSets;
            });
        },
        fetchFaculties: function(){
            this.$http.get('/facultyList', function(faculties){
                this.faculties = faculties;
            });
        },
        createSurvey: function(e){
            e.preventDefault();
            var survey = this.survey;
            this.$http.post('/surveys', survey).success(function(data, status, request){
                window.location.replace(data.url);
            })
            .error(function(data, status, request){
            this.errors = [];
            var errors = $.parseJSON(request.response);
                for(var key in errors){
                    this.errors.push(errors[key][0]);
                }
            });
        }
    },
    ready: function(){
        this.fetchQuestionSet();
        this.fetchFaculties();
        var self = this;

        var e = document.createEvent('HTMLEvents')
        e.initEvent('change', true, true)

        $(this.$el)
            .find('select')
            .select2({theme: "bootstrap"})
            .on('change', function() {
                this.dispatchEvent(e)
            });
    }
});