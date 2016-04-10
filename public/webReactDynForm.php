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
    <script src="script/reactcontactcomps.js"></script>
    <!--script src="js/JSXTransformer.js"></script-->
    
    <script>
    
/*
    

 
 //Actions
 
 function updateNewContact(contact){
   setState({newContact: contact});
 }
 
    
    
    
    var ContactView = React.createClass({
      propTypes: {
        fieldDescription: React.PropTypes.array.isRequired,
        inputFields: React.PropTypes.array.isRequired,
        typeFields: React.PropTypes.array.isRequired,
        newContact: React.PropTypes.object.isRequired,
        //onNewContactChange: to access the latest changes of the input fields
        onNewContactChange: React.PropTypes.func.isRequired,
        //function to add a new input field
        onNewFieldClicked: React.PropTypes.func.isRequired,
      },
      
      render: function() {
      
      var it = 0;
      var valueList = this.props.newContact;
      var oChgList = this.props.onNewContactChange;
      var oAddField = this.props.onNewFieldClicked;
      var typeFs = this.props.typeFields;
      var fieldDesc = this.props.fieldDescription;
      var nameItemElements = this.props.inputFieldsName
       .map(function(i){
        return React.createElement(ContactFormElement, {
          name: i.element,
          fieldText: i.element, 
          type: typeFs[it].element,
          placeholder: i.element,
          value: valueList,
          onChange: oChgList,
          onClicked: oAddField,
          })
          it++;
      });
      var emailItemElements = this.props.inputFields
      .map(function(i) { 
        return React.createElement(ContactFormMailElement, {
          name: i.element,
          fieldText: i.element, 
          type: typeFs[it].element,
          placeholder: i.element,
          value: valueList,
          onChange: oChgList,
          onClicked: oAddField,
        })
        it++;
      });
      var infoItemElements = this.props.inputFieldsInfo
      .map(function(i) { 
        return React.createElement(ContactFormElement, {
          name: i.element,
          fieldText: i.element, 
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
         React.createElement('tbody',{}, nameItemElements
          ),
         React.createElement('tbody',{}, emailItemElements
          ),
         React.createElement('tbody',{}, infoItemElements
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
    
    
  //input components of form  
  var ContactFormMailElement = React.createClass({
        propTypes: {
          fieldText: React.PropTypes.string.isRequired,
          name: React.PropTypes.string.isRequired,
          type: React.PropTypes.string.isRequired,
          placeholder: React.PropTypes.string.isRequired,
          value: React.PropTypes.object.isRequired,
          onChange: React.PropTypes.func.isRequired,
          onClicked: React.PropTypes.func.isRequired,
        },
        
        onItemChange: function(e) {
          var iname = this.props.name;
          this.props.onChange(Object.assign({},
          this.props.value,{[iname]: e.target.value}));
      },
      
      onAClicked: function() {
        this.props.onClicked();
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
              }),
              React.createElement('a', {
                          onClick: this.onAClicked}, '+')
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
          onNewFieldClicked: addNewField,
        })),
        document.getElementById('react-app')
        );
    }
    
    
 /*
 * Adds a new email field
 * called when the <a href=> of the Email component is clicked
 * 
 */

  function addNewField() {
    console.log('clicked an href');
    var fieldname = "email"
    var newmail = Object.assign({}, state.inputField, {key: state.inputFields.length + 1, 
                      element: fieldname.concat(state.inputFields.length+1)});
    console.log('newmail'+newmail.key+newmail.element);
    setState(
      {
      inputFields: state.inputFields.slice(0).concat(newmail),
      }
    );
  }
/*
* end
*/


    
    
    // Set initial data
setState({
  
  newContact: {first_name: "First Name", last_name: "Last Name", email: "email@mail.de", type: "Mobile", 
            number: "004976263", street: "street No. 1", pcode: "27923", city: "City",country: "Germany", 
            notes: "some notes..."},
            
  inputField: {key: 1, element: "newField"},
            
  inputFields: [
    {key: 1, element: "email"},
    ],
    typeFields: [
    {key: 1, element: "email"},
    ],
    fieldDescription: [
    {key: 1, descr: "Email:"},
    ],
    
  inputFieldsName: [
    {key: 1, element: "first_name"},
    {key: 2, element: "last_name"},
    ],
    typeFieldsName: [
    {key: 1, element: "text"},
    {key: 2, element: "text"},
    ],
    fieldDescriptionName: [
    {key: 1, descr: "First Name:"},
    {key: 2, descr: "Last Name:"},
    ],
    
  inputFieldsInfo: [
    {key: 1, element: "type"},
    {key: 2, element: "number"},
    {key: 3, element: "street"},
    {key: 4, element: "pcode"},
    {key: 5, element: "city"},
    {key: 6, element: "country"},
    {key: 7, element: "note_text"},
    ],
    typeFieldsInfo: [
    {key: 1, element: "text"},
    {key: 2, element: "text"},
    {key: 3, element: "text"},
    {key: 4, element: "text"},
    {key: 5, element: "text"},
    {key: 6, element: "text"},
    {key: 7, element: "textarea"},
    ],
    fieldDescriptionInfo: [
    {key: 1, descr: "Telephone:"},
    {key: 2, descr: "Number:"},
    {key: 3, descr: "Street:"},
    {key: 4, descr: "Postal Code:"},
    {key: 5, descr: "City:"},
    {key: 6, descr: "Country:"},
    {key: 7, descr: "Notes:"},
    ],
});

*/
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