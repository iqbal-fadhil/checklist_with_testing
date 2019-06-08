<?php
class ChecklistTest extends TestCase
{
    /**
     * /checklists [GET]
     */
    public function testShouldReturnAllChecklists(){
        $this->get("checklists", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'data' => ['*' =>
                [
                    'object_id',
                    'description',
                    'is_completed',
                    'due',
                    'urgency',
                    'completed_at',
                    'last_update_by',
                    'created_at',
                    'updated_at',
                    'links'
                ]
            ],
            'meta' => [
                '*' => [
                    'total',
                    'count',
                    'per_page',
                    'current_page',
                    'total_pages',
                    'links',
                ]
            ]
        ]);
        
    }
    /**
     * /checklists/id [GET]
     */
    public function testShouldReturnChecklists(){
        $this->get("checklists/2", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            ['data' =>
                [
                    'object_id',
                    'description',
                    'is_completed',
                    'due',
                    'urgency',
                    'completed_at',
                    'last_update_by',
                    'created_at',
                    'updated_at',
                    'links'
                ]
            ]    
        );
        
    }
    /**
     * /checklists [POST]
     */
    public function testShouldCreateChecklist(){
        $parameters = [
            'description'=>'This task should finish fast',
            'is_completed'=> false,
            'due'=>null,
            'urgency'=> '0',
 
        ];
        $this->post("checklists", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            ['data' =>
                [
                    'object_id',
                    'description',
                    'is_completed',
                    'due',
                    'urgency',
                    'completed_at',
                    'last_update_by',
                    'created_at',
                    'updated_at',
                    'links'
                ]
            ]    
        );
        
    }
    
    /**
     * /checklists/id [PUT]
     */
    public function testShouldUpdateChecklist(){
        $parameters = [
            'description'=>'This task should finish fast',
            'is_completed'=> true,
            'due'=>'today',
            'urgency'=> '1',
        ];
        $this->put("checklists/4", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            ['data' =>
                [
                    'object_id',
                    'description',
                    'is_completed',
                    'due',
                    'urgency',
                    'completed_at',
                    'last_update_by',
                    'created_at',
                    'updated_at',
                    'links'
                ]
            ]    
        );
    }
    /**
     * /checklists/id [DELETE]
     */
    public function testShouldDeleteChecklist(){
        
        $this->delete("checklists/5", [], []);
        $this->seeStatusCode(410);
        $this->seeJsonStructure([
                'status',
                'message'
        ]);
    }
}