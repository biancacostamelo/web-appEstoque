import React, { useEffect, useState } from "react";
import { fetchProdutos, deleteProduto } from "../Api";
import {
  View,
  FlatList,
  TouchableOpacity,
  Alert,
  StyleSheet,
} from "react-native";
import { Card, Text, IconButton } from "react-native-paper";

export default function Home({ navigation }) {
  const [produtos, setProdutos] = useState([]);

  useEffect(() => {
    fetchProdutos(setProdutos);
  }, []);

  const handleDelete = (id) => {
    Alert.alert(
      "Confirmação",
      "Tem certeza de que deseja deletar este Produto?",
      [
        { text: "Cancelar", style: "cancel" },
        {
          text: "Deletar",
          onPress: () => deleteProduto(id, setProdutos),
        },
      ]
    );
  };

  return (
    <View style={styles.container}>
      <FlatList
        data={produtos.produtos}
        keyExtractor={(item) => item.id.toString()}
        renderItem={({ item }) => (
          <Card style={styles.card}>
            <View style={styles.cardContent}>
              <View style={styles.infoColumn}>
                <Text style={styles.title}>Código: {item.id}</Text>
                <Text style={{ color: "white" }}>Produto: {item.nome}</Text>
                <Text style={{ color: "white" }}>
                  Data Vencimento: {item.data_vencimento}
                </Text>
                <Text style={{ color: "white" }}>
                  Estoque: {item.estoque_total}
                </Text>
                <Text style={{ color: "white" }}>
                  Categoria: {item.categoria_id}
                </Text>
              </View>

              <View style={styles.actionsColumn}>
                <IconButton
                  icon="pencil"
                  size={24}
                  iconColor="#3498db"
                  onPress={() =>
                    navigation.navigate("EditarProduto", { produto: item })
                  }
                />
                <IconButton
                  icon="delete"
                  size={24}
                  iconColor="#e74c3c"
                  onPress={() => handleDelete(item.id)}
                />
              </View>
            </View>
          </Card>
        )}
      />
      <TouchableOpacity
        style={styles.floatingButton}
        onPress={() => navigation.navigate("CadastroProduto")}
      >
        <Text style={styles.plusIcon}>+</Text>
      </TouchableOpacity>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    padding: 10,
    backgroundColor: "#1f222b",
  },
  card: {
    marginBottom: 5,
    borderRadius: 8,
    elevation: 3,
    backgroundColor: "#2e3241",
  },
  cardContent: {
    flexDirection: "row",
    justifyContent: "space-between",
    padding: 5,
  },
  infoColumn: {
    flex: 1,
    justifyContent: "center",
  },
  actionsColumn: {
    justifyContent: "space-around",
    alignItems: "center",
  },
  title: {
    fontWeight: "bold",
    fontSize: 16,
    marginBottom: 4,
    color: "white",
  },
  floatingButton: {
    position: "absolute",
    bottom: 20,
    alignSelf: "center",
    backgroundColor: "#27ae60",
    width: 60,
    right: 20,
    height: 60,
    borderRadius: 30,
    justifyContent: "center",
    alignItems: "center",
    elevation: 5,
  },
  plusIcon: {
    color: "#fff",
    fontSize: 32,
    lineHeight: 36,
    marginBottom: 2,
  },
});
