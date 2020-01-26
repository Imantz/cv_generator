var education = new Vue({
    el: '#education-div',
    data () {
        return {
            count: 1
        }
    },
    methods: {
        add_education : function(){
            this.count += 1;
        }
    }
});

var languages = new Vue({
    el: '#languages',
    data () {
        return {
            count: 0
        }
    },
    methods: {
        add_language : function(){
            this.count += 1;
        },
        minus : function(){
            this.count -= 1;
        }
    }
});