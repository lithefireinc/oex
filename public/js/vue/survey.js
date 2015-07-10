new Vue({
    el: "#create-survey",
    data: {
        survey: {
            title: '',
            description: '',
            instructions: '',
            question_set_id: null,
            schedule_id: null,
            faculty_id: null,
            start_date: null,
            expires: null,
            per_page: 10
        },
        questionSets: [],
        faculties: [],
        schedules: [],
        errors: [],
        subjDetails: {
            DAYS: '',
            TIME: '',
            ROOM: '',
            SECTION: '',
            COURSE: ''
        }
    },
    methods: {
        fetchQuestionSet: function(){
            this.$http.get(config.BASE+'/questionSetList', function(questionSets){
                this.questionSets = questionSets;
            });
        },
        fetchFaculties: function(){
            this.$http.get(config.BASE+'/facultyList', function(faculties){
                this.faculties = faculties;
            });
        },
        fetchSchedules: function(faculty){
            this.$http.get(config.BASE+'/scheduleList/'+faculty, function(schedules){
                this.schedules = schedules;
            });
        },
        fetchSubjectDetails: function(schedule){
            this.$http.get(config.BASE+'/subjectDetails/'+schedule, function(subject){
                this.subjDetails = subject;
            });
        },
        createSurvey: function(e){
            e.preventDefault();
            var survey = this.survey;
            this.$http.post(config.BASE+'/surveys', survey).success(function(data, status, request){
                if(typeof data.url != 'undefined')
                    window.location.replace(data.url);
            })
            .error(function(data, status, request){
            this.errors = [];
            var errors = $.parseJSON(request.response);
                for(var key in errors){
                    this.errors.push(errors[key][0]);
                }
            $('html, body').animate({ scrollTop: 0 }, 'fast');
            });
        },
        subjectDetails: function(){
            var self = this;

            this.$watch('survey.faculty_id', function(newVal, oldVal){
                if(self.survey.schedule_id !== null)
                {
                    $("#schedule_id").select2('val', null);
                    self.survey.schedule_id = '';
                }

                self.fetchSchedules(newVal);
            });

            this.$watch('survey.schedule_id', function(newVal, oldVal){
                if(newVal !== '')
                    self.fetchSubjectDetails(newVal);
            });
        }
    },
    ready: function(){
        this.fetchQuestionSet();
        this.fetchFaculties();
        var self = this;
        this.subjectDetails();

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
//# sourceMappingURL=survey.js.map