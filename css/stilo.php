.timeline
  list-style-type: none
  display: flex
  align-items: center
  justify-content: center
.li
  transition: all 200ms ease-in

.timestamp
  margin-bottom: 20px
  padding: 0px 40px
  display: flex
  flex-direction: column
  align-items: center
  font-weight: 100
.status
  padding: 0px 40px
  display: flex
  justify-content: center
  border-top: 2px solid #D6DCE0
  position: relative
  transition: all 200ms ease-in  
  h4
    font-weight: 600
  &:before
    content: ''
    width: 25px
    height: 25px
    background-color: white
    border-radius: 25px
    border: 1px solid #ddd
    position: absolute
    top: -15px
    left: 42%
    transition: all 200ms ease-in 
.li.complete
  .status
    border-top: 2px solid #66DC71
    &:before
      background-color: #66DC71
      border: none
      transition: all 200ms ease-in 
    h4
      color: #66DC71

@media (min-device-width: 320px) and (max-device-width: 700px)
  .timeline
    list-style-type: none
    display: block
  .li
    transition: all 200ms ease-in
    display: flex
    width: inherit
  .timestamp
    width: 100px
  .status
    &:before
      left: -8%
      top: 30%
      transition: all 200ms ease-in 

/// Layout stuff
html,body
  width: 100%
  height: 100%
  display: flex
  justify-content: center
  font-family: 'Titillium Web', sans serif
  color: #758D96

button
  position: absolute
  width: 100px
  min-width: 100px
  padding: 20px
  margin: 20px
  font-family: 'Titillium Web', sans serif
  border: none
  color: white
  font-size: 16px
  text-align: center
#toggleButton
  position: absolute
  left: 50px
  top: 20px
  background-color: #75C7F6