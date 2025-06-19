import React, { useState } from 'react';
import { View, Text, TextInput, Button, StyleSheet, Alert, SafeAreaView, TouchableOpacity } from 'react-native';
import { createUserWithEmailAndPassword } from 'firebase/auth';
import { setDoc, doc } from 'firebase/firestore';
import { auth, db } from '../Firebase';

const CadastroUsuario = ({ navigation }) => {
  const [email, setEmail] = useState('');
  const [senha, setSenha] = useState('');
  const [nome, setNome] = useState('');
  const [error, setError] = useState("");

  const handleCadastro = async () => {
     if (!nome || !email || !senha) {
      setError("Todos os campos são obrigatórios.");
      return;
    }

    try {
      const userCredential = await createUserWithEmailAndPassword(
        auth,
        email,
        senha
      );
      console.log(userCredential)
      const user = userCredential.user;

      await setDoc(doc(db, "usuarios", user.uid), {
        nome,
      });

      Alert.alert("Sucesso!", "Usuário cadastrado com sucesso!", [
        { text: "OK", onPress: () => navigation.replace("Home") },
      ]);
    } catch (err) {
      Alert.alert("Erro", "Erro não foi possivel cadastrar. Tente novamente!");
      console.log(err)
    }
  };

  return (
     <SafeAreaView style={estilo.container}>
      <View style={estilo.areaInput}>
        <Text style={estilo.textoLabel}>Nome:</Text>
        <TextInput
          style={estilo.textoinput}
          placeholderTextColor={"#5a5a5a"}
          placeholder="Nome de Usúario"
          onChangeText={setNome}
          value={nome}
        />
      </View>

      <View style={estilo.areaInput}>
        <Text style={estilo.textoLabel}>E-mail:</Text>
        <TextInput
          style={estilo.textoinput}
          placeholderTextColor={"#5a5a5a"}
          placeholder="Digite seu email"
          onChangeText={setEmail}
          value={email}
        />
      </View>

      <View style={estilo.areaInput}>
        <Text style={estilo.textoLabel}>Senha:</Text>
        <TextInput
          style={estilo.textoinput}
          placeholderTextColor={"#5a5a5a"}
          placeholder="Digite sua senha"
          onChangeText={setSenha}
          value={senha}
          secureTextEntry={true}
        />
      </View>

      <TouchableOpacity style={estilo.button} onPress={handleCadastro}>
        {error ? <Text style={estilo.error}>{error}</Text> : null}
        <Text style={estilo.buttonText}>Criar Usuário</Text>
      </TouchableOpacity>
    </SafeAreaView>
  );
};

const estilo = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: "#fff",
    alignItems: "center",
    justifyContent: "center",
    gap: 20,
    paddingHorizontal: 60,
  },
  lembrarUser: {
    width: "100%",
    display: "flex",
    gap: 5,
    flexDirection: "row",
    alignItems: "center",
    marginLeft: -8,
  },
  esqueceuSenha: {
    width: "100%",
    display: "flex",
    gap: 5,
    flexDirection: "row",
    alignItems: "center",
    justifyContent: "space-between",
    marginLeft: -8,
  },
  titulo: {
    fontSize: 40,
    fontWeight: "bold",
    textAlign: "center",
    color: "#f29100",
  },
  areaInput: {
    width: "100%",
    position: "relative",
  },
  logo: {
    width: "50%",
    height: 100,
  },
  imgLogo: {
    width: "100%",
    height: "100%",
    resizeMode: "contain",
  },
  textoLabel: {
    color: "#5a5a5a",
    fontSize: 12,
    backgroundColor: "#fff",
    position: "absolute",
    top: -10,
    left: 15,
    zIndex: 1,
    paddingHorizontal: 5,
    paddingVertical: 2,
    fontWeight: "700",
  },
  textoinput: {
    height: 47,
    border: 1,
    borderColor: "rgba(0, 0, 0, 0.32)",
    borderWidth: 1,
    borderRadius: 10,
    paddingLeft: 10,
    color: "#000",
  },
  button: {
    width: "100%",
    height: 40,
    backgroundColor: "#4f7afb",
    borderRadius: 10,
    alignItems: "center",
    justifyContent: "center",
  },
  buttonText: {
    color: "#fff",
    fontWeight: "700",
  },
  error: {
    color: "red",
  },
});

export default CadastroUsuario;