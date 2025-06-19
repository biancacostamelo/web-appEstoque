const URL_API = "https://apiestoque.webapptech.site/api/produtos"

export const fetchProdutos = async (setProdutos) => {
    try {
        const response = await fetch(URL_API)
        if(!response.ok) {
             throw new Error('Deu um errinho aqui');
        }
        const data = await response.json()
        setProdutos(data)
    } catch (error) {
        console.error('Erro ao buscar produtos na API', error)
        throw error
    }
}

export const updateProduto = async (produtoId, produtoAtualizado, navigation) => {
    try {
        const response = await fetch(`${URL_API}/${produtoId}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(produtoAtualizado),
        });

        console.log('Dados enviados:', produtoAtualizado);
        // console.log(response)
        if (response.status === 200) {
            alert('Sucesso! Produto atualizado com sucesso!');
            navigation.navigate('Home'); // volta para a tela principal
        } else {
            const textResponse = await response.text();
            console.log(textResponse)
            let responseData;
            try {
                responseData = JSON.parse(textResponse);
            } catch (error) {
                console.warn('A resposta não é um JSON válido.');
                responseData = null;
            }

            throw new Error(responseData?.message || 'Erro desconhecido ao atualizar o produto');
        }
    } catch (error) {
        console.error('Erro ao atualizar o produto:', error.message);
        alert('Erro ao atualizar', 'Detalhes: ' + error.message);
    }
};

export const deleteProduto = async (produtoId, setProdutos) => {
    try {
        const response = await fetch(`${URL_API}/${produtoId}`, {
            method: 'DELETE',
        });

        // Verifica se a resposta foi bem-sucedida
        if (response.ok) {
            const responseData = await response.json(); // Obtém o JSON da resposta

            if (responseData.success) {
                alert('Sucesso!', responseData.message);
                // Atualiza a lista localmente, removendo o livro excluído
                setProdutos((prevRegistros) => {
                    const novaLista = prevRegistros.filter((produtos) => produtos.codigo != saborId);
                    console.log('Nova lista de sabores:', novaLista);
                    return novaLista;
                });
            } else {
                alert('Erro', responseData.message);
            }
        } else {
            const textResponse = await response.text();

            let responseData;
            try {
                responseData = JSON.parse(textResponse); // tenta converter o texto para JSON
            } catch (error) {
                console.warn('A resposta não é um JSON válido.');
                responseData = null;
            }

            throw new Error(responseData?.message || 'Erro desconhecido ao excluir o sabor');
        }
    } catch (error) {
        console.error('Erro ao excluir sabor:', error.message);
        alert('Erro ao excluir', 'Detalhes: ' + error.message);
    }
};

export const createProduto = async (produtoData) => {
    try {
        const response = await fetch(URL_API, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(produtoData),
        });

        // Verifica se a API retornou status 204 (sem conteúdo)
        if (response.status === 204) {
            Alert.alert('Sucesso!', 'Cadastro realizado com sucesso!');
            return {}; // Retorna um objeto vazio para evitar erro
        }

        // Caso a API retorne conteúdo, tentamos converter para JSON
        const textResponse = await response.text();
        let responseData;
        console.log('Resposta bruta da API:', textResponse);

        try {
            responseData = JSON.parse(textResponse);
        } catch (error) {
            console.warn('A resposta não é um JSON válido.');
            responseData = null;
        }

        if (!response.ok || !responseData) {
            throw new Error(responseData?.message || 'Erro desconhecido na API');
        }

        return responseData;
    } catch (error) {
        console.error('Erro ao cadastrar o sabor:', error.message);
        Alert.alert('Erro ao cadastrar', 'Detalhes: ' + error.message);
        return null;
    }
};