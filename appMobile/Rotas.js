import React from 'react'
import { NavigationContainer } from '@react-navigation/native'
import { createStackNavigator } from '@react-navigation/stack'
import Home from './components/home'
import CadastroProduto from './components/cadastroProduto'
import EditarProduto from './components/editarProduto'
import Login from './components/login'
import CadastroUsuario from './components/cadastroUsuario'

function Rotas() {
  
    const Stack = createStackNavigator()
    
    return (
   <NavigationContainer>
    <Stack.Navigator initialRouteName='Login'>
        <Stack.Screen name='Login' component={Login}/>
        <Stack.Screen name='Home' component={Home}/>
        <Stack.Screen name='CadastroProduto' component={CadastroProduto}/>
        <Stack.Screen name='EditarProduto' component={EditarProduto}/>
        <Stack.Screen name='CadastroUsuario' component={CadastroUsuario}/>
    </Stack.Navigator>
   </NavigationContainer>
  )
}

export default Rotas