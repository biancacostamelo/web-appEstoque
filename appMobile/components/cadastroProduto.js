import React, { useState } from 'react'
import { createProduto } from '../Api';
import { View, TextInput, Button, Alert } from "react-native";
import { useNavigation } from '@react-navigation/native';


export default function CadastroProduto() {
  const [registro, setRegistros] = useState([])
  const [nome, setNome] = useState('')
  const [data_vencimento, setData_vencimento] = useState('')
  const [estoque_total, setEstoque_total] = useState('')
  const [categoria_id, setCategoria_id] = useState('')

  const [selectedSaborId, setSelectedSaborId] = useState(null);
  const navigation = useNavigation();

  const handleSubmit = async () => {
    if (!nome || !data_vencimento || !estoque_total || !categoria_id) {
      alert('Erro', 'Preencha todos os campos');
      return;202
    }
    const novoProduto = { nome, data_vencimento, estoque_total, categoria_id }

    if (selectedSaborId) {
        await updateProduto(selectedSaborId, novoProduto);
        setSelectedSaborId(null);
       }else{
        const addedSabor = await createProduto(novoProduto);
        if(addedSabor){
            alert('Sucesso', 'Produto cadastrado com sucesso!', [
                {text: 'OK', onPress: () => navigation.navigate("Home") }
            ]);
        } 
       }

    setNome('')
    setData_vencimento('')
    setEstoque_total('')
    setCategoria_id('')
  }

  return (
    <View>
      <TextInput placeholder="Produto" value={nome} onChangeText={setNome} />
      <TextInput placeholder="Vencimento" value={data_vencimento} onChangeText={setData_vencimento} />
      <TextInput keyboardType='numeric' placeholder="Estoque" value={String(estoque_total)} onChangeText={setEstoque_total} />
      <TextInput placeholder="id categoria" value={String(categoria_id)} onChangeText={setCategoria_id} />
      <Button title="Cadastrar" onPress={handleSubmit} />
    </View>
  )
}
