import React, { useState } from 'react'
import { updateProduto } from '../Api'
import { View, TextInput, Button, Alert } from "react-native";

export default function EditarProduto({route, navigation}) {
  const { produto } = route.params 
  const [nome, setNome] = useState(produto.nome)
  const [data_vencimento, setData_vencimento] = useState(produto.data_vencimento)
  const [estoque_total, setEstoque_total] = useState(produto.estoque_total)
  const [categoria_id, setCategoria_id] = useState(produto.categoria_id)
  // console.log(produto)
  
  const handleUpdate = () => {
    const produtoAtualizado = {
      nome, data_vencimento, estoque_total, categoria_id
    }

    Alert.alert("Confirmação", "Tem certeza que deseja alterar este produto?????", 
        [
            { text: "Cancelar", style: "cancel" },
            { text: "Alterar", onPress: () => updateProduto(produto.id, produtoAtualizado, navigation)},
        ]
    )
  }

  return (
     <View>
      <TextInput placeholder="Sabor" value={nome} onChangeText={setNome} />
      <TextInput placeholder="Descrição" value={data_vencimento} onChangeText={setData_vencimento} />
      <TextInput keyboardType='numeric' placeholder="Estoque" value={String(estoque_total)} onChangeText={setEstoque_total} />
      <TextInput placeholder="id categoria" value={String(categoria_id)} onChangeText={setCategoria_id} />
      <Button title="Alterar" onPress={handleUpdate} />
    </View>
  )
}

