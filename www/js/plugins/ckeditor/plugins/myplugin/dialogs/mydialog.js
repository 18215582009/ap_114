CKEDITOR.dialog.add( 'myDialog', function( editor )   
{   
    return {    
        title : '自定义插件',   
        minWidth : 400,   
        minHeight : 200,   
        contents : [   
            {   
                id : 'tab1',   
                label : 'First Tab',   
                title : 'First Tab',   
                elements :   
                [   
                    {   
                        id : 'input1',   
                        type : 'text',   
                        label : '共有人姓名'  
                    },
					{   
                        id : 'input2',   
                        type : 'text',   
                        label : '共有人身份证'  
                    }
                ]   
            }   
        ]   
    };   
} ); 