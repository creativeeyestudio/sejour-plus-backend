import React from "react";
import { HydraAdmin } from "@api-platform/admin";

// Assurez-vous que l'URL pointe vers votre API
export const App: React.FC = () => <HydraAdmin entrypoint="https://127.0.0.1:8000/api" />;

export default App;