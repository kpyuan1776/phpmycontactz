<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Add Contacts</title>
    <link rel="stylesheet" href="http://localhost/contacts/public/style/style.css" type="text/css">
    
  </head>
  <body>
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="865">
      <tr>
      <td id="oben" valign="top" height="156"><div class="headertextoben">
        </tr>
        <tr>
      <td id="navi" width="865"><div class="headernavi">
        
    </tr>
    <tr>   
      <td id="mainbg" valign="top">
        <div id="indexLeftColumn">
        </div>
        
        <div id="haupttext" >
          
          <h1>Dynamically Generated Form using React JS</h1>
          
          
    <div id="react-app"></div>

    <script src="js/react.js"></script>
    <script src="js/react-dom.js"></script>
    <!--script src="js/JSXTransformer.js"></script-->
    
    <script>
    

    

 
 //Actions
 
 function updateNewContact(contact){
   setState({newContact: contact});
 }
 
    
    
    
    var ContactView = React.createClass({
      propTypes: {
        fieldDescription: React.PropTypes.array.isRequired,
        inputFields: React.PropTypes.array.isRequired,
        typeFields: React.PropTypes.array.isRequired,
        contacts: React.PropTypes.array.isRequired,
        newContact: React.PropTypes.object.isRequired,
        //onNewContactChange: to access the latest changes of the input fields
        onNewContactChange: React.PropTypes.func.isRequired,
      },
      
      render: function() {
      
      
      var it = 0;
      var valueList = this.props.newContact;
      var oChgList = this.props.onNewContactChange;
      var typeFs = this.props.typeFields;
      var fieldDesc = this.props.fieldDescription;
      var testItemElements = this.props.inputFields
      .map(function(i) { 
        return React.createElement(ContactFormElement, {
          name: i.element,
          fieldText: i.element,//fieldDesc[it].descr, 
          type: typeFs[it].element,
          placeholder: i.element,
          value: valueList,
          onChange: oChgList,
        })
        it++;
      })
       

    return (
      React.createElement('div', {className: 'ContactView'},
        React.createElement('form', {action: 'contacts', method: 'post', className: 'ContactView-form'},
        React.createElement('table', {className: 'ContactView-table'}, 
         React.createElement('tbody',{}, testItemElements
          )
         ),
         React.createElement('button',{type: 'submit'},"Add Contact")
        )
      )
    )
  },
    });
    
    
  //input components of form  
  var ContactFormElement = React.createClass({
        propTypes: {
          fieldText: React.PropTypes.string.isRequired,
          name: React.PropTypes.string.isRequired,
          type: React.PropTypes.string.isRequired,
          placeholder: React.PropTypes.string.isRequired,
          value: React.PropTypes.object.isRequired,
          onChange: React.PropTypes.func.isRequired,
        },
        
        onItemChange: function(e) {
          var iname = this.props.name;
          this.props.onChange(Object.assign({},
          this.props.value,{[iname]: e.target.value}));
      },
      
      render: function() {
        return(
          React.createElement('tr',{},
            React.createElement('td',{},this.props.fieldText),
            React.createElement('td',{},
              React.createElement('input', {
                type: this.props.type,
                name: this.props.name,
                placeholder: this.props.placeholder,
                value: this.props.value[this.props.name],
                onChange: this.onItemChange,
              })
            ))
          )},
        
    });
    


    //Model
    var state={};
    
    function setState(changes){
      Object.assign(state,changes);
    
      ReactDOM.render(
        React.createElement(ContactView, Object.assign({}, state,
        { onNewContactChange: updateNewContact,
        })),
        document.getElementById('react-app')
        );
    }
    
    // Set initial data
setState({
  contacts: [
    {key: 1, first_name: "James", last_name: "Marshal", email: "james@jamesknelson.com", notes: "Front-end Unicorn"},
    {key: 2, first_name: "Jim", last_name: "McCarthy", email: "jim@example.com"},
    {key: 3, first_name: "Hallo", last_name: "Sersen", email:"ref@def.de"},
    {key: 4, first_name: "Hallo2", last_name: "Sersen2"},
  ],
  newContact: {first_name: "First Name", last_name: "Last Name", email: "email@mail.de", type: "Mobile", 
            number: "004976263", street: "street No. 1", pcode: "27923", city: "City",country: "Germany", 
            notes: "some notes..."},
            
  inputFields: [
    {key: 1, element: "first_name"},
    {key: 2, element: "last_name"},
    {key: 3, element: "email"},
    {key: 4, element: "type"},
    {key: 5, element: "number"},
    {key: 6, element: "street"},
    {key: 7, element: "pcode"},
    {key: 8, element: "city"},
    {key: 9, element: "country"},
    {key: 10, element: "note_text"},
    ],
    
    typeFields: [
    {key: 1, element: "text"},
    {key: 2, element: "text"},
    {key: 3, element: "email"},
    {key: 4, element: "text"},
    {key: 5, element: "text"},
    {key: 6, element: "text"},
    {key: 7, element: "text"},
    {key: 8, element: "text"},
    {key: 9, element: "text"},
    {key: 10, element: "textarea"},
    ],
    
    fieldDescription: [
    {key: 1, descr: "First Name:"},
    {key: 2, descr: "Last Name:"},
    {key: 3, descr: "Email:"},
    {key: 4, descr: "Telephone:"},
    {key: 5, descr: "Number:"},
    {key: 6, descr: "Street:"},
    {key: 7, descr: "Postal Code:"},
    {key: 8, descr: "City:"},
    {key: 9, descr: "Country:"},
    {key: 10, descr: "Notes:"},
    ],
});

</script>
    
    
</div>
      
      </td>
    </tr>
    <tr>
      <td id="unten" height="74">
        </td>
    </tr>
</table>
  </body>
</html>