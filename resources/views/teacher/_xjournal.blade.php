@extends('layouts.app')   
@section('content')
<div id="app">
<div class="container-fluid pt-9">
        <div class="row">
            <div class="col-xl-8">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="">
                                <h3 class="col-12 mb-0">
                                    Журнал
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <br>
                        <div class="row">
                            <div class="col-12">
                                
                                <table class="table align-items-center white-bg journal">
                        
                                        <tr>
                                           <th rowspan="2" class="first">№</th>
                                           <th rowspan="2" class="align-left">ФИО</th>
                                           <th colspan="100%">Январь</th>
                                        </tr>
                                        <tr>
                                            <th v-for="item in days" ><button data-container="body" data-toggle="popover" data-placement="top" :data-content="item['homework']">@{{ item['day'] }}</button></th>
                                        </tr>

                                        <tr v-for="(student, index) in students">
                                            <td class="first">@{{ index + 1 }}</td>
                                            <td class="align-left">@{{ student['name'] }}</td>
                                            <mark-cell 
                                            v-for="(mark_item, m_index) in student['marks']" 
                                            :key="m_index"
                                            @click="get_mark(student, index, mark_item, m_index)" mark="mark_item['mark']" mark_id="mark_item['mark_id']">
                                            	
                                            </mark-cell>	
                                            <td v-for="(mark_item, m_index) in student['marks']" 
                                            	class="mark" 
                                            	>
                                                @{{ mark_item['mark'] }}
                                            </td>
                                        </tr>
                                </table>
                               
                             
                            </div> 
                        </div>
                        <div class="row mt-3">
                        </div>
                        <div class="row">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card bg-secondary shadow mb-4" v-if="showMarkCard">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="">
                                <h3 class="col-12 mb-0">
                                    Оценка
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="contrast">Выберите: <b></b></p>
                        <button class="btn btn-info" v-for="(mark, index) in marks" @click="set_mark(mark['mark_id'], mark['mark'])">@{{ mark['mark'] }}</button>
                    </div>
                </div>
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="">
                                <h3 class="col-12 mb-0">
                                    Информация
                                </h3>
                                
                                    
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="contrast">Сегодня: <b>{{ date('d.m.Y', strtotime(now())) }}</b></p>
                        <p class="contrast">Класс: <b>{{ $tt->grade->grade }} {{ $tt->grade->name }}</b></p>
                        <p class="contrast">Предмет: <b>{{ $tt->subject->name }}</b></p>
                        <p class="contrast">Урок: <b>{{ date('H:i', strtotime($tt->lesson->start)) }} - {{ date('H:i', strtotime($tt->lesson->end)) }}</b></p>
                        <p class="contrast">Кабинет: <b>{{ $tt->cabinet->cabinet }}</b></p>
                        <p class="contrast">Домашнее задание: <b>{{ $tt->homework() }}</b></p>
                    </div>
                </div>
            </div>
        </div>
        
  
</div>
</div>

<style>
.journal {
    width: auto;
}
.card-body p.contrast {
    color: #4452a3;
}
.journal td:nth-child(2) {
    width: 300px;
    text-align: left;
    padding-left: 10px !important;
}
.journal th,
.journal td{
    position: relative;
    border: 1px solid #cacaca;
    padding: 0 !important;
    text-align: center;
}
.journal th.first,
.journal td.first {
    width: 50px;
}
.journal th.mark,
.journal td.mark {
    width: 22px;
    height: 22px;
    cursor: pointer;
}
.journal td.mark:hover {
    background: #85ecff;
}
.journal td.mark button {
    width: 20px;
    height: 20px;
    padding: 0;
    border: 0;
    transform: translateY(0) !important;
    border-radius: 0;
    background: #fcf8e3;
    box-shadow: none;
    outline: 0;
}
.align-left {
    text-align: left;
}
</style>

@endsection  
@section('vue')
<script>

</script>
<script>
Vue.component('mark_cell', {
	props: {
		mark : '',
		mark_id: Number

	},
	template: `
		<td class="mark">
            @{{ mark }}
        </td>
	`,
	computed: {

	}
});

var app = new Vue({
    el: '#app',
    data: {
    	selectedItem: null,
        days: [
            @foreach($days as $day) 
            {
                day: '{{ date("d", strtotime($day->day)) }}',
                homework: '{{ $day->homework() }}'
            },
            @endforeach
        ],
        students: [
            @foreach($students as $student)
                {
                	index: '{{ $loop->index }}',
                    name: '{{ $student->lastname }} {{ $student->firstname }}',
                    id: {{ $student->id }},
                    marks: [
                        @foreach($student->marks($tt->subject_id) as $mark)
                        {
                            index: '{{ $loop->index }}',
                            day: '{{ $mark->day }}',
                            mark: '{{ $mark->desc }}',
                            mark_id: '{{ $mark->mark_id }}',
                            tt_id: '{{ $mark->id }}',
                        },
                        @endforeach
                    ]
                },
            @endforeach
            
        ],
        marks: [
            @foreach($marks as $mark)
                {
                    mark: '{{ $mark->mark }}',
                    desc: '{{ $mark->description }}',
                    mark_id: '{{ $mark->id }}',
                },
            @endforeach
        ],
        currentDay: 0,
        currentStudent: 0,
        currentStudentIndex: 0,
        currentMarkIndex: 0,
        showMarkCard: false

    },
    methods: {
        get_mark(student, student_index, mark_item, mark_index) {
            this.showMarkCard = true;
            this.currentDay = mark_item.tt_id;
            this.currentStudent = student.id;
            this.currentStudentIndex = student_index;
            this.currentMarkIndex = mark_index; 
            this.handleSelectItem(student);
            if(mark_item.mark != '') {
            	alert('Оценка уже поставлена');
            }
        },
        handleSelectItem(item){
	       this.selectedItem = item.name;
	       console.log('selectedItem = '+ this.selectedItem);
	       // you can also handle toggle action here manually to open and close dropdown
	    },
        set_mark($mark_id, $mark) {

        	//console.log($mark_id + ' INDEx' + $mark + 'mark ' + this.currentMarkIndex);
        	this.students[this.currentStudentIndex]['marks'][this.currentMarkIndex]['mark_id'] = $mark_id;
        	this.students[this.currentStudentIndex]['marks'][this.currentMarkIndex]['mark'] = $mark;

            axios.post('/journal/set_mark', {
			    params: {
			      student_id: this.currentStudent,
			      tt_id: this.currentDay,
			      mark_id: $mark_id
			    }
			  }).then(function (response) {
			    this.showMarkCard = false;
			  })
			  .catch(function (error) {
			    console.log(error);
			  })
			  .finally(function () {
			    
			  }); 

			  this.showMarkCard = false;
        },
    }
});    
</script>
@endsection  